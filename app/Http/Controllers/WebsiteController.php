<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Job;
use App\Models\ApplyJob;
use App\Models\Category;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Models\Location;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;

class WebsiteController extends Controller
{

    public function __construct()
    {
        view()->share('locations', Location::all());
        view()->share('categories', Category::where('status', 'active')->get());
        View::share('notifications', Notification::get());
    }

    public function search(Request $request)
    {
        // Get the selected category name and location from the request
        $selectedCategoryName = $request->categoryname;
        $selectedCity = $request->city;

        // Initialize the query for jobs with a join on locations and categories
        $query = Job::query();

        // Join the locations and categories tables
        $query->join('locations', 'jobs.location_id', '=', 'locations.id')
            ->join('categories', 'jobs.category_id', '=', 'categories.id');

        // If a category name is provided, filter jobs by the selected category
        if ($selectedCategoryName) {
            $query->where('categories.categoryname', '=', $selectedCategoryName);
        }

        // If a city is provided, filter jobs by the selected city
        if ($selectedCity) {
            $query->where('locations.city', '=', $selectedCity);
        }

        // If a job title is provided for searching
        if ($request->has('job_title') && !empty($request->job_title)) {
            // Split the job title into words
            $words = explode(' ', $request->job_title);

            // Loop through the words and apply the filtering condition
            foreach ($words as $word) {
                if (!empty($word)) {
                    // Add the filtering condition for job title (from the first word onwards)
                    $query->where('jobs.job_title', 'LIKE', '%' . $word . '%');
                }
            }
        }

        // Fetch the filtered jobs
        $jobs = $query->select('locations.city', 'categories.categoryname', 'jobs.*')->get();

        // Return the view with the filtered jobs
        return view('Website.index', compact('jobs'));
    }

    public function index()
    {
        $jobs = Job::where('status', 'active')->paginate(4);
        return view('Website.index', compact('jobs'))->with('showWtag', true);
    }

    public function about()
    {
        return view('Website.about');
    }

    public function contact()
    {
        return view('Website.contact');
    }

    public function postAJob()
    {
        $categories = Category::where('status', 'active')->get();
        $locations = Location::where('status', 'active')->get();
        return view('Website.post_job', compact('categories', 'locations'));
    }

    public function addJob(Request $request)
    {
        extract($request->all());
        $job = Job::create([
            'category_id' => $category,
            'location_id' => $location,
            'hr_id' => auth()->id(),
            'job_title' => $job_title,
            'job_description' => $job_description,
            'qualification' => $qualification,
            'requirement' => $requirement,
            'benefits' => $benefits,
            'type' => $type,
            'salary_offer' => $salary_offer,
            'company_name' => $company_name,
            'status' => 'inactive',
        ]);
        $notification = Notification::create([
            'to' => auth()->id(),
            'from' => '3',
            'job_id' => $job->id,
            'admin_message' => auth()->user()->name . ' created a job',
            'hr_message' => 'You created a job',
        ]);
        if ($job && $notification) {
            return redirect()->route('manage_jobs')->with(['title' => 'Success', 'message' => 'Job created successfully', 'icon' => 'success']);
        } else {
            return redirect()->back()->with(['title' => 'Failed!',  'message' => 'Job has not been created', 'icon' => 'error']);
        }
    }

    public function editJob($id = null)
    {
        $job = Job::find($id);
        if ($job) {
            $categories = Category::where('status', 'active')->get();
            $locations = Location::where('status', 'active')->get();
            return view('website.edit_job', compact('job', 'categories', 'locations'));
        }
        return redirect()->back()->with(['title' => 'Failed!',  'message' => 'Unable to edit Job', 'icon' => 'error']);
    }

    public function updateJob(Request $request)
    {
        extract($request->all());
        $job = Job::find($request->id);
        if ($job) {
            $job->update([
                'category_id' => $category,
                'location_id' => $location,
                'hr_id' => auth()->id(),
                'job_title' => $job_title,
                'job_description' => $job_description,
                'qualification' => $qualification,
                'requirement' => $requirement,
                'benefits' => $benefits,
                'type' => $type,
                'salary_offer' => $salary_offer,
                'company_name' => $company_name,
            ]);
            $notification = Notification::create([
                'to' => auth()->id(),
                'from' => '3',
                'job_id' => $job->id,
                'admin_message' => auth()->user()->name . ' updated a job',
                'hr_message' => 'You updated a job',
            ]);
            return redirect()->route('manage_jobs')->with(['title' => 'Success', 'message' => 'Job updated successfully', 'icon' => 'success']);
        } else {
            return redirect()->back()->with(['title' => 'Failed!',  'message' => 'Job has not been updated', 'icon' => 'error']);
        }
    }


    public function destroyJob($id = null)
    {
        $Job = Job::find($id);
        if ($Job) {
            $Job->delete();
            return response()->json(['success' => 'Job deleted successfully']);
        }
        return response()->json(['error' => 'Job has not been deleted successfully']);
    }

    public function jobs(Request $request)
    {
        $jobs = Job::where('status', 'active')->paginate(4);
        return view('Website.jobs', compact('jobs'));
    }

    public function jobDetails($id = null)
    {
        $job = Job::find($id);
        return view('Website.job_detail', compact('job'));
    }

    public function createResume()
    {
        return view('Website.create_resume');
    }

    public function updateProfileSettings()
    {
        return view('Website.update_hr_profile');
    }

    public function myResume()
    {
        return view('Website.my_resume');
    }

    public function JobAlerts()
    {
        $myAppliedJob = ApplyJob::where('user_id', auth()->id())->get();
        return view('Website.job_alert', compact('myAppliedJob'));
    }

    public function manageJobs()
    {
        return view('Website.manage_jobs');
    }

    public function fetchJobs()
    {
        $myApplications = Job::where('hr_id', auth()->id())->get();
        return response()->json($myApplications);
    }

    public function manageApplications()
    {
        $appliedJobs = ApplyJob::where('hr_id', auth()->id())->paginate(5);
        return view('Website.manage_applications', compact('appliedJobs'));
    }

    public function viewAppliedJobs($id = null)
    {
        $viewAppliedJob = ApplyJob::find($id);
        return view('Website.view_applied_job', compact('viewAppliedJob'));
    }

    public function updateAppliedJobStatus($id = null, $status = null)
    {
        $job = ApplyJob::with('user')->find($id);

        if ($job) {
            $job->status = $status;
            $job->update();
            $user = $job->user;
            $username = $user->name;
            $status = $user->status;
            $user_email = $user->email;

            dispatch(new SendEmailJob($username,$status,$user_email));
            // Mail::send('send-email', ['username' => $user->name, 'status' => $status], function ($message) use ($user) {
            //     $message->to($user->email)
            //         ->subject('Job Status Updated');
            // });

            return redirect()->back()->with([
                'title' => 'Success',
                'message' => 'Status updated successfully and email sent!',
                'icon' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'title' => 'Failed!',
                'message' => 'Status not updated successfully',
                'icon' => 'error'
            ]);
        }
    }

    public function applyJob($id = null)
    {
        if (auth()->user()->role === 'hr' || auth()->user()->role === 'admin') {
            return redirect()->back()->with(['title' => 'Access Denied', 'icon' => 'error', 'message' => 'You must be logged in as a user to apply for a job.']);
        }
        $job = Job::find($id);

        $alreadyApplied = ApplyJob::where('status', 'applied')->where('job_id', $id)->where('user_id', auth()->id())->first();
        if ($alreadyApplied) {
            return redirect()->back()->with('message', 'You already applied for this job');
        }
        return view('Website.apply_job', compact('job'));
    }


public function applyForJob(Request $request)
{
    $alreadyApplied = ApplyJob::where('status', 'applied')
        ->where('job_id', $request->id)
        ->where('user_id', auth()->id())
        ->first();

    if ($alreadyApplied) {
        return redirect()->back()->with('message', 'You already applied for this job');
    }

    $path = null;

    if ($request->hasFile('job_attachment')) {
        $file = $request->file('job_attachment');
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Store file temporarily in /tmp
        $destinationPath = '/tmp';
        $file->move($destinationPath, $fileName);

        // You can store the path or filename if needed
        $path = '/tmp/' . $fileName;
    }

    $applyJob = ApplyJob::create([
        'job_id' => $request->id,
        'user_id' => auth()->id(),
        'hr_id' => $request->hr_id,
        'candidate_name' => $request->candidate_name,
        'candidate_email' => $request->candidate_email,
        'education' => $request->education,
        'qualification' => $request->qualification,
        'cover_letter' => $request->cover_letter,
        'status' => 'applied',
        'job_attachment' => $path,
    ]);

    if ($applyJob) {
        return redirect()->route('job_detail', [$request->id])->with('message', 'You applied for this job.');
    } else {
        return redirect()->back()->with('message', 'Your job application could not be submitted.');
    }
}


    public function checkEmail(Request $request)
    {
        $checkEmail = User::where('email', $request->check_email)->exists();
        return response()->json(['isAvailable' => !$checkEmail]);
    }

   public function updateUserProfile(Request $request)
{
    // Fetch user by ID
    $user = User::find($request->id);

    if (!$user) {
        return redirect()->back()->with([
            'title' => 'Error',
            'message' => 'User not found.',
            'icon' => 'error'
        ]);
    }

    $path = $user->image; // Default to old image

    // Handle profile image upload
    if ($request->hasFile('profile_image')) {
        // Get file from request
        $file = $request->file('profile_image');

        // Store the image in storage/app/public/profile_images
        // 'public' means the file will be stored in storage/app/public and accessible via a symlink in the public directory
        $path = $file->store('profile_images', 'public');
    }

    // Update user data
    $user->update([
        'profile_title'     => $request->input('profile_title', $user->profile_title),
        'name'              => $request->input('name', $user->name),
        'email'             => $request->input('email', $user->email),
        'education'         => $request->input('education', $user->education),
        'past_experience'   => $request->input('past_experience', $user->past_experience),
        'skill_1'           => $request->input('skill_one', $user->skill_1),
        'skill_2'           => $request->input('skill_two', $user->skill_2),
        'skill_3'           => $request->input('skill_three', $user->skill_3),
        'about_me'          => $request->input('about_me', $user->about_me),
        'address'           => $request->input('address', $user->address),
        'phone_no'          => $request->input('phone_no', $user->phone_no),
        'image'             => $path,
        'cover_letter'      => $request->input('cover_letter', $user->cover_letter),
    ]);

    // Redirect to the resume page with success message
    return redirect()->route('my_resume')->with([
        'title' => 'Success',
        'message' => 'Profile updated successfully.',
        'icon' => 'success'
    ]);
}

    public function updateHrProfile(Request $request)
{
    $user = User::find($request->id);

    if (!$user) {
        return redirect()->back()->with([
            'title' => 'Error',
            'message' => 'User not found.',
            'icon' => 'error'
        ]);
    }

    $path = $user->image; 

    // Handle image upload
    if ($request->hasFile('profile_image')) {
        $file = $request->file('profile_image');
        $path = $file->store('profile_images', 'public');
    }

    // Update user info
    $user->update([
        'profile_title' => $request->input('profile_title', $user->profile_title),
        'name'          => $request->input('name', $user->name),
        'education'     => $request->input('education', $user->education),
        'about_me'      => $request->input('about_me', $user->about_me),
        'address'       => $request->input('address', $user->address),
        'phone_no'      => $request->input('phone_no', $user->phone_no),
        'image'         => $path,
    ]);

    return redirect()->route('manage_jobs')->with([
        'title' => 'Success',
        'message' => 'Profile updated successfully.',
        'icon' => 'success'
    ]);
}


    public function logout()
    {
        auth()->logout();
        return redirect()->route('/');
    }
}
