<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[WebsiteController::class,'index'])->name('/');
Route::get('/about',[WebsiteController::class,'about'])->name('about');
Route::get('/contact',[WebsiteController::class,'contact'])->name('contact');
Route::get('/jobs',[WebsiteController::class,'jobs'])->name('jobs');
Route::get('job_detail/{id?}',[WebsiteController::class,'jobDetails'])->name('job_detail');
Route::post('check_email',[WebsiteController::class,'checkEmail'])->name('check_email');
Route::get('/search',[WebsiteController::class,'search'])->name('search');

Route::get('/apply_job/{id?}',[WebsiteController::class,'applyJob'])->name('apply_job')->middleware('auth');

Route::middleware(['role:admin'])->group(function () {
//Admin
Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('/categories',[AdminController::class,'categories'])->name('categories');
Route::post('/store_category',[AdminController::class,'storeCategory'])->name('store_category');
Route::post('/update_category',[AdminController::class,'updateCategory'])->name('update_category');
Route::delete('delete_category/{id}', [AdminController::class, 'deleteCategory'])->name('delete_category');
Route::get('/admin_job',[AdminController::class,'data'])->name('admin_job');
Route::get('/add_data',[AdminController::class,'addData'])->name('add_data');
Route::get('update_job_status/{id}/{status}',[AdminController::class,'updateJobStatus'])->name('update_job_status');
Route::get('/location',[AdminController::class,'location'])->name('location');
Route::post('/store_location',[AdminController::class,'storeLocation'])->name('store_location');
Route::post('/update_location',[AdminController::class,'updateLocation'])->name('update_location');
Route::delete('delete_location/{id}', [AdminController::class, 'deleteLocation'])->name('delete_location');

});

Route::middleware(['role:user'])->group(function () {
//Candidate
Route::get('/my_resume',[WebsiteController::class,'myResume'])->name('my_resume');
Route::get('/update_profile',[WebsiteController::class,'createResume'])->name('update_profile');
Route::get('/my_applied_jobs',[WebsiteController::class,'jobAlerts'])->name('my_applied_jobs');
Route::post('job_applied',[WebsiteController::class,'applyForJob'])->name('job_applied');
Route::post('/update_user_profile',[WebsiteController::class,'updateUserProfile'])->name('update_user_profile');
});

Route::middleware(['role:hr'])->group(function () {
//Employer
Route::get('/post_job',[WebsiteController::class,'postAJob'])->name('post_job');
Route::post('/add_job',[WebsiteController::class,'addJob'])->name('add_job');
Route::get('/edit_job/{id?}',[WebsiteController::class,'editJob'])->name('edit_job');
Route::post('update_job',[WebsiteController::class,'updateJob'])->name('update_job');
Route::post('destroy_job/{id}',[WebsiteController::class,'destroyJob'])->name('destroy_job');
Route::get('/manage_jobs',[WebsiteController::class,'manageJobs'])->name('manage_jobs');
Route::get('/fetch_jobs',[WebsiteController::class,'fetchJobs'])->name('fetch_jobs');
Route::get('/manage_applications',[WebsiteController::class,'manageApplications'])->name('manage_applications');
Route::get('view_applied_job/{id}',[WebsiteController::class,'viewAppliedJobs'])->name('view_applied_job');
Route::get('update_applied_job_status/{id?}/{status?}',[WebsiteController::class,'updateAppliedJobStatus'])->name('update_applied_job_status');
Route::get('/update_hr_profile_settings',[WebsiteController::class,'updateProfileSettings'])->name('update_hr_profile_settings');
Route::post('/update_hr_profile',[WebsiteController::class,'updateHrProfile'])->name('update_hr_profile');
});

Auth::routes();



Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/call-back', [LoginController::class, 'handleGoogleCallback']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout',[WebsiteController::class,'logout'])->name('logout');
