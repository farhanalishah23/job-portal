<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Notification;

class AdminController extends Controller
{
    public function __construct()
    {
        View::share('notifications', Notification::get());
    }

    public function dashboard()
    {
        $jobs = Job::get();
        return view('backend.dashboard',compact('jobs'));
    }
    public function categories()
    {
        $data = Category::all();

        return view('backend.categories', compact('data'));
    }

    public function storeCategory(Request $request)
    {
        $categoryName = Category::where('categoryname', $request->name)->first();
        if($categoryName){
            return redirect()->back()->with(['title' => 'Failed!', 'message' => 'Category name already been taken.', 'icon' => 'error']);
        }
        $categories = Category::create([
            'categoryname' => $request->name,
            'status' => $request->status ?? 'inactive',
        ]);
        if ($categories) {
            return redirect()->back()->with(['title' => 'Success', 'message' => 'Category created successfully', 'icon' => 'success']);
        } else {
            return redirect()->back()->with(['title' => 'Failed!',  'message' => 'Category not created successfully', 'icon' => 'error']);
        }
    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request->id);
        if ($category) {
            $category->update([
                'categoryname' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->back()->with(['title' => 'Success', 'message' => 'Category updated successfully', 'icon' => 'success']);
        } else {
            return redirect()->back()->with(['title' => 'Failed!',  'message' => 'Category not updated successfully', 'icon' => 'error']);
        }
    }

    public function deleteCategory(Request $request)
    {
        $category = Category::find($request->id);
        if ($category) {
            $category->delete();
            return redirect()->back()->with(['title' => 'Success', 'message' => 'Category deleted successfully', 'icon' => 'success']);
        } else {
            return redirect()->back()->with(['title' => 'Failed!',  'message' => 'Category not deleted successfully', 'icon' => 'error']);
        }
    }


    public function location()
    {
        $data = Location::all();
        return view('backend.location', compact('data'));
    }

    public function data()
    {
        $jobs = Job::get();
        return view('backend.data', compact('jobs'));
    }

    public function updateJobStatus($id = null, $status = null)
    {
        $job = Job::where('id', $id)->update(['status' => $status]);
        if ($job) {
            return redirect()->back()->with(['title' => 'Success', 'message' => 'Status updated successfully', 'icon' => 'success']);
        } else {
            return redirect()->back()->with(['title' => 'Failed!',  'message' => 'Status not updated successfully', 'icon' => 'error']);
        }
    }

    public function addData()
    {
        return view('backend.add_data');
    }

    public function storeLocation(Request $request)
    {
        $locationName = Location::where('city', $request->name)->first();
        if($locationName){
            return redirect()->back()->with(['title' => 'Failed!', 'message' => 'Location has already been taken.', 'icon' => 'error']);
        }
        $location = Location::create([
            'city' => $request->name,
            'status' => $request->status ?? 'inactive',
        ]);
        if ($location) {
            return redirect()->back()->with(['title' => 'Success', 'message' => 'Location created successfully', 'icon' => 'success']);
        } else {
            return redirect()->back()->with(['title' => 'Failed!',  'message' => 'Location not created successfully', 'icon' => 'error']);
        }
    }

    public function updateLocation(Request $request)
    {
        // return $request->all();
        $location = Location::find($request->id);
        if ($location) {
            $location->update([
                'city' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->back()->with(['title' => 'Success', 'message' => 'Location updated successfully', 'icon' => 'success']);
        } else {
            return redirect()->back()->with(['title' => 'Failed!',  'message' => 'Location not updated successfully', 'icon' => 'error']);
        };
    }

    public function deleteLocation(Request $request)
    {
        $location = Location::find($request->id);
        if ($location) {
            $location->delete();
            return redirect()->back()->with(['title' => 'Success', 'message' => 'Location deleted successfully', 'icon' => 'success']);
        } else {
            return redirect()->back()->with(['title' => 'Failed!',  'message' => 'Location not deleted successfully', 'icon' => 'error']);
        }
    }
}
