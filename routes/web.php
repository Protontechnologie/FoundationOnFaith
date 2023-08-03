<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ClientController;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\GenericController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/', [IndexController::class, 'index'])->name('web.index');
Route::get('/about-us', [IndexController::class, 'about'])->name('web.about');
Route::get('/programs', [IndexController::class, 'programs'])->name('web.programs');
Route::get('/sponsors', [IndexController::class, 'sponsors'])->name('web.sponsors');
Route::get('/contact-us', [IndexController::class, 'contact'])->name('web.contact');
Route::get('/donation', [IndexController::class, 'donation'])->name('web.donation');


Route::post('/contact-form-submit', [InquiryController::class, 'contact_submit'])->name('web.contact_submit');
Route::post('/sponsor-form-submit', [InquiryController::class, 'sponsor_submit'])->name('web.sponsor_submit');
Route::post('/donation-form-submit', [InquiryController::class, 'donation_submit'])->name('web.donation_submit');
Route::get('/checkout-process/{id}', [InquiryController::class, 'checkout_process'])->name('checkout_process');
Route::post('/submit-checkout-payment-process', [InquiryController::class, 'submit_checkout_process'])->name('submit_checkout_process');



Route::get('/cart', [CartController::class, 'cart'])->name('web.cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('web.checkout');




Route::get('/employee-registration', [RegistrationController::class, 'index'])->name('employee_registration');
Route::post('/employee-registration-submit', [RegistrationController::class, 'registration_submit'])->name('registration_submit');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('dashboard', [HomeController::class , 'dashboard'])->name('dashboard');
    Route::get('dashboard/user-profile', [HomeController::class , 'user_profile'])->name('user_profile');
    Route::get('dashboard/contact-view', [InquiryController::class , 'contact_view'])->name('contact_view');
    Route::get('dashboard/sponsor-view', [InquiryController::class , 'sponsor_view'])->name('sponsor_view');
    Route::get('dashboard/donation-view', [InquiryController::class , 'donation_view'])->name('donation_view');
    Route::get('website/settings', [HomeController::class , 'website_setting'])->name('website.setting');
    
    
    Route::post('/user-info-update', [HomeController::class, 'user_infoupdate'])->name('user_infoupdate');
    Route::get('dashboard/user-office-details', [HomeController::class , 'user_office_details'])->name('user_office_details');
    Route::post('/user-office-info-update', [HomeController::class, 'user_office_infoupdate'])->name('user_office_infoupdate');
    Route::post('/user-file-info-update', [HomeController::class, 'user_file_infoupdate'])->name('user_file_infoupdate');
    Route::get('dashboard/user-file-details', [HomeController::class , 'user_file_details'])->name('user_file_details');
    Route::post('/user-photo-update', [HomeController::class, 'upload_image'])->name('upload_image');
    Route::post('/profile-submit', [HomeController::class, 'profile_submit'])->name('profile_submit');

    Route::get('dashboard/user-rights', [HomeController::class , 'user_rights'])->name('user_rights');
    // Reports Routes
    Route::post('/user-updates', [HomeController::class , 'user_updates'])->name('user_updates');


    Route::get('/registered-user-report', [ReportController::class , 'registered_user_report'])->name('registered_user_report');
    Route::get('/attendance-sheet-import', [ReportController::class , 'attendance_sheet_import'])->name('attendance_sheet_import');
    Route::post('attendance-import-submit', [ReportController::class, 'attendance_import_submit'])->name('attendance_import_submit');
    
    // Reports Routes End
    Route::group(['prefix'=>'dashboard', 'middleware' => ['auth']], function () {
        Route::resource('user', UserController::class);
        Route::resource('team', TeamController::class);
        Route::resource('program', ProgramController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('membership', MembershipController::class);
        Route::group(['prefix'=>'assign', 'middleware' => ['auth']], function () {
            Route::resource('task', TaskController::class);
            Route::resource('client', ClientController::class);
        });
        Route::get('/my-task', [TaskController::class , 'my_task'])->name('dashboard.my_task');
        Route::post('/change-my-task-status', [TaskController::class, 'update_mytask'])->name('update_mytask');
        
        Route::resource('departments', DepartmentController::class);
        Route::resource('designations', DesignationController::class);

        Route::post('/check-username-availability', [UserController::class, 'username_availability'])->name('username_availability');
        Route::post('/change-user-status', [UserController::class, 'change_status'])->name('change_status');
    });

    

    
    Route::get('/user-rights', [HomeController::class , 'user_rights'])->name('user_rights');
    Route::post('change-password', 'ChangePasswordController@store')->name('change_password');



    Route::get('/attributes', [GenericController::class , 'roles'])->name('roles');
    Route::get('/attribute/{slug}', [GenericController::class , 'listing'])->name('listing');
    Route::post('/generic-submit', [GenericController::class , 'generic_submit'])->name('generic_submit');
    Route::post('/assign-role-submit', [GenericController::class , 'roleassign_submit'])->name('roleassign_submit');
    Route::post('/role-assign-modal', [GenericController::class , 'role_assign_modal'])->name('role_assign_modal');
    
    
    // Payroll Routes
    Route::get('/payroller', [PayrollController::class , 'payroller'])->name('payroller');
    // Payroll Routes End
});





