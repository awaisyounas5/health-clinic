<?php

use App\Http\Controllers\Api\Auth\ForgetPasswordController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\ChangePasswordController;
use App\Http\Controllers\Api\Staff\Team\TeamController;
use App\Http\Controllers\Api\Staff\Account\ProfileController;
use App\Http\Controllers\Api\Staff\Appointment\AppointmentController;

use App\Http\Controllers\Api\Staff\CarePlan\CarePlanController;
use App\Http\Controllers\Api\Staff\Incident\IncidentController;
use App\Http\Controllers\Api\Staff\Notice\NoticeBoardController;
use App\Http\Controllers\Api\Staff\Patient\PatientController;
use App\Http\Controllers\Api\Staff\Roaster\RoasterController;
use App\Http\Controllers\Api\Staff\Notification\NotificationController;

use App\Http\Controllers\Api\Patient\Team\TeamController as PatientTeamController;
use App\Http\Controllers\Api\Patient\Account\ProfileController as PatientProfileController;
use App\Http\Controllers\Api\Patient\Appointment\AppointmentController as PatientAppointmentController;
use App\Http\Controllers\Api\Patient\CarePlan\CarePlanController as PatientCarePlanController;
use App\Http\Controllers\Api\Patient\Incident\IncidentController as PatientIncidentController;
use App\Http\Controllers\Api\Patient\Notice\NoticeBoardController as PatientNoticeBoardController;
use App\Http\Controllers\Api\Patient\Patient\PatientController as PatientPatientController;
use App\Http\Controllers\Api\Patient\Roaster\RoasterController as PatientRoasterController;
use App\Http\Controllers\Api\Patient\Notification\NotificationController as PatientNotificationController;
use App\Http\Controllers\Api\Patient\Review\ReviewController as PatientReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum','role:staff_member'])->prefix('staff_member')->group(function () {

    // user  profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/fetch', [ProfileController::class, 'user_details'])->name('profile.fetch');
    Route::post('/profile/update', [ProfileController::class, 'update_profile'])->name('profile.update');
    Route::post('/profile/picture_update', [ProfileController::class, 'picture_update'])->name('profile.update.picture');
    Route::post('/profile/change/password', [ChangePasswordController::class, 'update_password'])->name('profile.update.password');


    //team crud
    Route::get('/team', [TeamController::class, 'index'])->name('team');
    Route::post('/team/store', [TeamController::class, 'store'])->name('team.store');
    Route::put('/team/update/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/delete/{id}', [TeamController::class, 'delete'])->name('team.delete');

    //fetch api for notice board
    Route::get('/noticeboard', [NoticeBoardController::class, 'index'])->name('noticeboard');

    //fetch api for appointments
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments');

    //fetch api for patients
    Route::get('/patients', [PatientController::class, 'index'])->name('patients');

    //fetch api for care plans
    Route::get('/care_plans/{id}', [CarePlanController::class, 'index'])->name('care_plans');

    //fetch & Post api for incident report
    Route::get('/incident_report', [IncidentController::class, 'index'])->name('incident');
    Route::post('/incident/store', [IncidentController::class, 'store'])->name('incident.store');
    Route::get('/incident/details/{id}', [IncidentController::class, 'incident_details'])->name('incident.details');

    //roaster details
    Route::get('/roaster', [RoasterController::class, 'index'])->name('roaster');
    Route::post('/roaster/change_status/{id}', [RoasterController::class, 'change_status'])->name('roaster.change_status');
    Route::post('/roaster/shift_task/{id}', [RoasterController::class, 'shift_task'])->name('roaster.shift_task');
    Route::get('/roaster/shift_task_detail/{id}', [RoasterController::class, 'shift_task_detail'])->name('roaster.shift_task');

    //notification
    Route::get('/notification', [NotificationController::class, 'index'])->name('notification');
    Route::get('/notification_count', [NotificationController::class, 'notification_count'])->name('notification.count');
    Route::post('/mark_as_read/{id}', [NotificationController::class, 'mark_as_read'])->name('notification.mark_as_read');
    Route::post('/mark_as_unread/{id}', [NotificationController::class, 'mark_as_unread'])->name('notification.mark_as_unread');


});


Route::middleware(['auth:sanctum','role:patient'])->prefix('patient')->group(function () {

    // user  profile
    Route::get('/profile', [PatientProfileController::class, 'index'])->name('profile');
    Route::get('/profile/fetch', [PatientProfileController::class, 'user_details'])->name('profile.fetch');
    Route::post('/profile/update', [PatientProfileController::class, 'update_profile'])->name('profile.update');
    Route::post('/profile/picture_update', [PatientProfileController::class, 'picture_update'])->name('profile.update.picture');
    Route::post('/profile/change/password', [ChangePasswordController::class, 'update_password'])->name('profile.update.password');


    //team crud
    Route::get('/team', [PatientTeamController::class, 'index'])->name('team');
    Route::post('/team/store', [PatientTeamController::class, 'store'])->name('team.store');
    Route::put('/team/update/{id}', [PatientTeamController::class, 'update'])->name('team.update');
    Route::delete('/team/delete/{id}', [PatientTeamController::class, 'delete'])->name('team.delete');

    //fetch api for notice board
    Route::get('/noticeboard', [PatientNoticeBoardController::class, 'index'])->name('noticeboard');

    //fetch api for appointments
    Route::get('/appointments', [PatientAppointmentController::class, 'index'])->name('appointments');

    //fetch api for patients
    Route::get('/patients', [PatientPatientController::class, 'index'])->name('patients');

    //fetch api for care plans
    Route::get('/care_plans/{id}', [PatientCarePlanController::class, 'index'])->name('care_plans');

    //fetch & Post api for incident report
    Route::get('/incident_report', [PatientIncidentController::class, 'index'])->name('incident');
    Route::post('/incident/store', [PatientIncidentController::class, 'store'])->name('incident.store');
    Route::get('/incident/details/{id}', [PatientIncidentController::class, 'incident_details'])->name('incident.details');

    //roaster details
    Route::get('/roaster', [PatientRoasterController::class, 'index'])->name('roaster');

    //notification
    Route::get('/notification', [PatientNotificationController::class, 'index'])->name('notification');
    Route::get('/notification_count', [PatientNotificationController::class, 'notification_count'])->name('notification.count');
    Route::post('/mark_as_read/{id}', [PatientNotificationController::class, 'mark_as_read'])->name('notification.mark_as_read');
    Route::post('/mark_as_unread/{id}', [PatientNotificationController::class, 'mark_as_unread'])->name('notification.mark_as_unread');

    //review store
    Route::post('/review', [PatientReviewController::class, 'store'])->name('review.store');


});

Route::post('/login',[LoginController::class,'login']);
Route::post('/register',[RegisterController::class,'register']);
Route::post('/send_reset_password_email',[ForgetPasswordController::class,'send_reset_password_email']);
