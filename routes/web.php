<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;

use App\Http\Controllers\Company\ManagerController;
use App\Http\Controllers\Company\PatientController;
use App\Http\Controllers\Company\PayRateController;
use App\Http\Controllers\Company\ShiftTypeController;
use App\Http\Controllers\Company\NoticeboardController;
use App\Http\Controllers\Company\StaffController;
use App\Http\Controllers\Company\TeamController;
use App\Http\Controllers\Company\AppointmentController;
use App\Http\Controllers\Company\AuditController;
use App\Http\Controllers\Company\CarePlanController;
use App\Http\Controllers\Company\CompetencyController;
use App\Http\Controllers\Company\FinanceController;
use App\Http\Controllers\Company\IncidentController;
use App\Http\Controllers\Company\LoginUserController;
use App\Http\Controllers\Company\NotificationController;
use App\Http\Controllers\Company\SettingController;
use App\Http\Controllers\Company\RoutineController;
use App\Http\Controllers\Company\MedicationController;
use App\Http\Controllers\Company\ObservationController;
use App\Http\Controllers\Company\ReviewController;
use App\Http\Controllers\Company\RoasterController;
use App\Http\Controllers\Company\RiskAssessmentController;
use App\Http\Controllers\Company\ShiftNoteController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Manager\AppointmentController as ManagerAppointmentController;
use App\Http\Controllers\Manager\AuditController as ManagerAuditController;
use App\Http\Controllers\Manager\CarePlanController as ManagerCarePlanController;
use App\Http\Controllers\Manager\CompetencyController as ManagerCompetencyController;
use App\Http\Controllers\Manager\MedicationController as ManagerMedicationController;
use App\Http\Controllers\Manager\NoticeboardController as ManagerNoticeboardController;
use App\Http\Controllers\Manager\ObservationController as ManagerObservationController;
use App\Http\Controllers\Manager\PatientController as ManagerPatientController;
use App\Http\Controllers\Manager\PayRateController as ManagerPayRateController;
use App\Http\Controllers\Manager\RiskAssessmentController as ManagerRiskAssessmentController;
use App\Http\Controllers\Manager\RoasterController as ManagerRoasterController;
use App\Http\Controllers\Manager\RoutineController as ManagerRoutineController;
use App\Http\Controllers\Manager\SettingController as ManagerSettingController;
use App\Http\Controllers\Manager\ShiftNoteController as ManagerShiftNoteController;
use App\Http\Controllers\Manager\ShiftTypeController as ManagerShiftTypeController;
use App\Http\Controllers\Manager\StaffController as ManagerStaffController;
use App\Http\Controllers\Manager\TeamController as ManagerTeamController;
use App\Http\Controllers\Patient\AppointmentController as PatientAppointmentController;
use App\Http\Controllers\Patient\SettingController as PatientSettingController;
use App\Http\Controllers\Patient\ReviewController as PatientReviewController;
use App\Http\Controllers\Patient\ComplimentController as PatientComplimentController;
use App\Http\Controllers\Patient\RoasterController as PatientRoasterController;
use App\Http\Controllers\Patient\SuggestionController as PatientSuggestionController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\Staff\AppointmentController as StaffAppointmentController;
use App\Http\Controllers\Staff\IncidentController as StaffIncidentController;
use App\Http\Controllers\Staff\NoticeboardController as StaffNoticeboardController;
use App\Http\Controllers\Staff\RoasterController as StaffRoasterController;
use App\Http\Controllers\Staff\SettingController as StaffSettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class,'index']);
Route::get('/contact_us',[MainController::class,'contact_us'])->name('contact_us');
Route::get('/blog',[MainController::class,'blog'])->name('blog');
Route::get('/blog/{slug}',[MainController::class,'single_blog'])->name('single_blog');
Route::get('/about_us',[MainController::class,'about_us'])->name('about_us');
Route::get('/appointment',[MainController::class,'appointment'])->name('appointment');
Route::post('/contact_us_store',[MainController::class,'contact_us_store'])->name('contact_us.store');

Route::get('/home', function () {
    if (Auth::user()->hasRole('company')) {
        return redirect()->route('company.dashboard');
    } elseif (Auth::user()->hasRole('super_admin')) {
        return redirect()->route('admin.dashboard');
    } elseif (Auth::user()->hasRole('super_admin')) {
        return redirect()->route('admin.dashboard');
    } elseif (Auth::user()->hasRole('staff_member')) {
        return redirect()->route('staff_member.dashboard');
    } elseif (Auth::user()->hasRole('manager')) {
        return redirect()->route('manager.dashboard');
    } elseif (Auth::user()->hasRole('patient')) {
        return redirect()->route('patient.dashboard');
    }
})->name('home');

Route::middleware(['auth', 'role:company', 'check_status'])->prefix('company')->name('company.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    //create read update delete for teams
    Route::get('/team', [TeamController::class, 'index'])->name('team');
    Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('/team/store', [TeamController::class, 'store'])->name('team.store');
    Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('/team/update/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/delete/{id}', [TeamController::class, 'delete'])->name('team.delete');

    //create read update delete for Noticeboard
    Route::get('/noticeboard', [NoticeboardController::class, 'index'])->name('noticeboard');
    Route::get('/noticeboard/create', [NoticeboardController::class, 'create'])->name('noticeboard.create');
    Route::post('/noticeboard/store', [NoticeboardController::class, 'store'])->name('noticeboard.store');
    Route::get('/noticeboard/edit/{id}', [NoticeboardController::class, 'edit'])->name('noticeboard.edit');
    Route::put('/noticeboard/update/{id}', [NoticeboardController::class, 'update'])->name('noticeboard.update');
    Route::delete('/noticeboard/delete/{id}', [NoticeboardController::class, 'delete'])->name('noticeboard.delete');

    // create read update delete for Appointment
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/edit/{id}', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('/appointments/update/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('/appointments/delete/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    Route::get('/appointments/get-staff-by-team', [AppointmentController::class, 'getStaffByTeam'])->name('appointments.getStaffByTeam');

    //create read update delete for shift_type
    Route::get('/shift_type', [ShiftTypeController::class, 'index'])->name('shift_type');
    Route::get('/shift_type/create', [ShiftTypeController::class, 'create'])->name('shift_type.create');
    Route::post('/shift_type/store', [ShiftTypeController::class, 'store'])->name('shift_type.store');
    Route::get('/shift_type/edit/{id}', [ShiftTypeController::class, 'edit'])->name('shift_type.edit');
    Route::put('/shift_type/update/{id}', [ShiftTypeController::class, 'update'])->name('shift_type.update');
    Route::delete('/shift_type/delete/{id}', [ShiftTypeController::class, 'delete'])->name('shift_type.delete');


    //create read update delete for patient
    Route::get('/patient', [PatientController::class, 'index'])->name('patient');
    Route::get('/patient/create', [PatientController::class, 'create'])->name('patient.create');
    Route::post('/patient/store', [PatientController::class, 'store'])->name('patient.store');
    Route::get('/patient/edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
    Route::get('/patient/view/{id}', [PatientController::class, 'view'])->name('patient.view');
    Route::put('/patient/update/{id}', [PatientController::class, 'update'])->name('patient.update');
    Route::delete('/patient/delete/{id}', [PatientController::class, 'delete'])->name('patient.delete');


    //create read update delete for manager
    Route::get('/manager', [ManagerController::class, 'index'])->name('manager');
    Route::get('/manager/create', [ManagerController::class, 'create'])->name('manager.create');
    Route::post('/manager/store', [ManagerController::class, 'store'])->name('manager.store');
    Route::get('/manager/edit/{id}', [ManagerController::class, 'edit'])->name('manager.edit');
    Route::get('/manager/view/{id}', [ManagerController::class, 'view'])->name('manager.view');
    Route::post('/manager/update/{id}', [ManagerController::class, 'update'])->name('manager.update');
    Route::delete('/manager/delete/{id}', [ManagerController::class, 'delete'])->name('manager.delete');

    //create read update delete for staff
    Route::get('/staff', [StaffController::class, 'index'])->name('staff');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
    Route::post('/staff/store', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
    Route::get('/staff/view/{id}', [StaffController::class, 'view'])->name('staff.view');
    Route::post('/staff/update/{id}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('/staff/delete/{id}', [StaffController::class, 'delete'])->name('staff.delete');


    //create read update delete for pay_rate
    Route::get('/pay_rate', [PayRateController::class, 'index'])->name('pay_rate');
    Route::get('/pay_rate/create', [PayRateController::class, 'create'])->name('pay_rate.create');
    Route::post('/pay_rate/store', [PayRateController::class, 'store'])->name('pay_rate.store');
    Route::get('/pay_rate/edit/{id}', [PayRateController::class, 'edit'])->name('pay_rate.edit');
    Route::get('/pay_rate/view/{id}', [PayRateController::class, 'view'])->name('pay_rate.view');
    Route::post('/pay_rate/update/{id}', [PayRateController::class, 'update'])->name('pay_rate.update');
    Route::delete('/pay_rate/delete/{id}', [PayRateController::class, 'delete'])->name('pay_rate.delete');

    //create read update delete for routines
    Route::get('/routines', [RoutineController::class, 'index'])->name('routines');
    Route::get('/routines/view/{patient}', [RoutineController::class, 'view'])->name('routines.view');
    Route::get('/routines/create', [RoutineController::class, 'create'])->name('routines.create');
    Route::post('/routines/store', [RoutineController::class, 'store'])->name('routines.store');
    Route::get('/routines/edit/{id}', [RoutineController::class, 'edit'])->name('routines.edit');
    Route::put('/routines/update/{id}', [RoutineController::class, 'update'])->name('routines.update');
    Route::delete('/routines/delete/{id}', [RoutineController::class, 'destroy'])->name('routines.destroy');

    //create read update delete for medications
    Route::get('/medications', [MedicationController::class, 'index'])->name('medications');
    Route::get('/medications/view/{patient}', [MedicationController::class, 'view'])->name('medications.view');
    Route::get('/medications/create', [MedicationController::class, 'create'])->name('medications.create');
    Route::post('/medications', [MedicationController::class, 'store'])->name('medications.store');
    Route::get('/medications/edit/{id}', [MedicationController::class, 'edit'])->name('medications.edit');
    Route::put('/medications/update/{id}', [MedicationController::class, 'update'])->name('medications.update');
    Route::delete('/medications/delete/{id}', [MedicationController::class, 'destroy'])->name('medications.destroy');


    //create read update delete for observation
    Route::get('/observation', [ObservationController::class, 'index'])->name('observation');
    Route::get('/observation/view/{patient}', [ObservationController::class, 'view'])->name('observation.view');
    Route::get('/observation/create', [ObservationController::class, 'create'])->name('observation.create');
    Route::post('/observation/store', [ObservationController::class, 'store'])->name('observation.store');
    Route::get('/observation/edit/{id}', [ObservationController::class, 'edit'])->name('observation.edit');
    Route::put('/observation/update/{id}', [ObservationController::class, 'update'])->name('observation.update');
    Route::delete('/observation/delete/{id}', [ObservationController::class, 'destroy'])->name('observation.destroy');

    //list and view of care plan
    Route::get('/careplan', [CarePlanController::class, 'index'])->name('careplan');
    Route::get('/careplan/view/{id}', [CarePlanController::class, 'view'])->name('careplan.view');


    Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notifications.create');
    Route::post('/notifications/send', [NotificationController::class, 'send_notifications'])->name('notifications.send');
    Route::get('/notifications',  [NotificationController::class, 'index'])->name('notifications.index');
    Route::delete('/notifications/delete/{id}',  [NotificationController::class, 'delete'])->name('notifications.delete');

    Route::get('/manage/login', [LoginUserController::class, 'index'])->name('manage.login');
    Route::get('/settings/change_password', [SettingController::class, 'change_password'])->name('setting.change_password');
    Route::post('/settings/update_password', [SettingController::class, 'update_password'])->name('setting.update_password');
    Route::get('/manage/login-history', [LoginUserController::class, 'logged_in_users'])->name('manage.login-history');



    Route::get('/view/profile', [SettingController::class, 'view'])->name('view.profile');
    Route::get('/edit/profile', [SettingController::class, 'edit'])->name('edit.profile');
    Route::post('/update/profile', [SettingController::class, 'update'])->name('update.profile');

    // incident crud
    Route::get('/incidents/create_report', [IncidentController::class, 'create_report'])->name('incidents.create_report');
    Route::post('/incidents/store_report', [IncidentController::class, 'store_report'])->name('incidents.store_report');

    Route::get('/incidents/edit_report/{id}', [IncidentController::class, 'edit_report'])->name('incidents.edit_report');
    Route::put('/incidents/update_report/{id}', [IncidentController::class, 'update_report'])->name('incidents.update_report');
    Route::get('/incidents/view_report/{id}', [IncidentController::class, 'view_incident_report'])->name('incidents.view_report');

    Route::get('/incidents/create_investigation/{id}', [IncidentController::class, 'create_investigation'])->name('incidents.create_investigation');
    Route::post('/incidents/store_investigation/{id}', [IncidentController::class, 'store_investigation'])->name('incidents.store_investigation');
    Route::get('/incidents/view_investigation/{id}', [IncidentController::class, 'view_investigation_report'])->name('incidents.view_investigation');

    Route::get('/incidents/edit_investigation/{id}', [IncidentController::class, 'edit_investigation'])->name('incidents.edit_investigation');
    Route::put('/incidents/update_investigation/{id}', [IncidentController::class, 'update_investigation'])->name('incidents.update_investigation');

    Route::get('/incidents/create_action/{id}', [IncidentController::class, 'create_action'])->name('incidents.create_action');
    Route::post('/incidents/store_action/{id}', [IncidentController::class, 'store_action'])->name('incidents.store_action');

    Route::get('/incidents/edit_action/{id}', [IncidentController::class, 'edit_action'])->name('incidents.edit_action');
    Route::put('/incidents/update_action/{id}', [IncidentController::class, 'update_action'])->name('incidents.update_action');
    Route::get('/incidents/view_action/{id}', [IncidentController::class, 'view_action_report'])->name('incidents.view_action');

    Route::delete('/incidents/action_delete/{id}', [IncidentController::class, 'action_delete'])->name('incidents.action_delete');
    Route::delete('/incidents/incident_delete/{id}', [IncidentController::class, 'incident_delete'])->name('incidents.incident_delete');
    Route::delete('/incidents/investigation_delete/{id}', [IncidentController::class, 'investigation_delete'])->name('incidents.investigation_delete');
    Route::get('/incidents/view_reports', [IncidentController::class, 'view_report'])->name('incidents.view_reports');
    Route::get('/incidents/view_investigations', [IncidentController::class, 'view_investigation'])->name('incidents.view_investigations');
    Route::get('/incidents/view_actions', [IncidentController::class, 'view_action'])->name('incidents.view_actions');
    Route::post('/incidents/store_position', [IncidentController::class, 'store_position'])->name('incidents.store_position');
    Route::post('/incidents/store_recommendation', [IncidentController::class, 'store_recommendation'])->name('incidents.store_recommendation');
    Route::post('/incidents/store_trigger', [IncidentController::class, 'store_trigger'])->name('incidents.store_trigger');
    Route::post('/incidents/store_incident_type', [IncidentController::class, 'store_incident_type'])->name('incidents.store_incident_type');
    Route::post('/incidents/store_result', [IncidentController::class, 'store_result'])->name('incidents.store_result');
    Route::post('/incidents/store_action_plan', [IncidentController::class, 'store_action_plan'])->name('incidents.store_action_plan');

    //roaster module
    Route::get('/roaster', [RoasterController::class, 'index'])->name('roaster');
    Route::post('/roaster/event_store', [RoasterController::class, 'event_store'])->name('roaster.store');
    Route::delete('/roaster/delete/{id}', [RoasterController::class, 'delete'])->name('roaster.delete');
    Route::post('/roaster/event_edit/{id}', [RoasterController::class, 'event_edit'])->name('roaster.edit');
    Route::post('/roaster/publish_events/{id}', [RoasterController::class, 'publish_events'])->name('roaster.publish');
    Route::get('/pay_rates', [RoasterController::class, 'pay_rates'])->name('pay_rates');
    Route::get('/events', [RoasterController::class, 'events'])->name('events');

    //roaster module
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
    Route::get('/reviews/view/{id}', [ReviewController::class, 'view'])->name('reviews.view');
    Route::get('/reviews/change_status/{id}', [ReviewController::class, 'change_status'])->name('reviews.change_status');

    //Risk Assessment module
    Route::get('/risk_assessment/template/create', [RiskAssessmentController::class, 'template_create'])->name('risk_assessment.template.create');
    Route::get('/risk_assessment', [RiskAssessmentController::class, 'index'])->name('risk_assessment');
    Route::get('/risk_assessment/view/{id}', [RiskAssessmentController::class, 'view'])->name('risk_assessment.view');
    Route::get('/risk_assessment/view_assessment/{id}', [RiskAssessmentController::class, 'view_assessment'])->name('risk_assessment.view_assessment');
    Route::get('/risk_assessment/create', [RiskAssessmentController::class, 'create'])->name('risk_assessment.create');
    Route::post('/risk_assessment/store', [RiskAssessmentController::class, 'store'])->name('risk_assessment.store');
    Route::get('/risk_assessment/edit/{id}', [RiskAssessmentController::class, 'edit'])->name('risk_assessment.edit');
    Route::post('/risk_assessment/update/{id}', [RiskAssessmentController::class, 'update'])->name('risk_assessment.update');
    Route::delete('/risk_assessment/delete/{id}', [RiskAssessmentController::class, 'destroy'])->name('risk_assessment.delete');

    Route::get('/template', [RiskAssessmentController::class, 'template_list'])->name('template');
    Route::post('/risk_assessment/template_store', [RiskAssessmentController::class, 'template_store'])->name('risk_assessment.template_store');
    Route::get('/risk_assessment/template', [RiskAssessmentController::class, 'template'])->name('risk_assessment.template');
    Route::get('/risk_assessment/template_edit/{id}', [RiskAssessmentController::class, 'template_edit'])->name('risk_assessment.template_edit');
    Route::post('/template/update/{id}', [RiskAssessmentController::class, 'template_update'])->name('risk_assessment.template_update');
    Route::delete('/template/delete/{id}', [RiskAssessmentController::class, 'template_delete'])->name('risk_assessment.template_delete');



    //audit create update delete and list
    Route::get('/audit', [AuditController::class, 'index'])->name('audit');
    Route::get('/audit/create', [AuditController::class, 'create'])->name('audit.create');
    Route::post('/audit/store', [AuditController::class, 'store'])->name('audit.store');
    Route::get('/audit/edit/{id}', [AuditController::class, 'edit'])->name('audit.edit');
    Route::post('/audit/update/{id}', [AuditController::class, 'update'])->name('audit.update');
    Route::delete('/audit/delete/{id}', [AuditController::class, 'delete'])->name('audit.delete');


    // competency routes

    Route::get('/competency/passed',[CompetencyController::class,'competency_pass'])->name('competency.passed');
    Route::get('/competency/improvement',[CompetencyController::class,'competency_improvement'])->name('competency.improvement');
    Route::get('/competency/failed',[CompetencyController::class,'competency_failed'])->name('competency.failed');
    Route::get('/competency/passed/get_passed_data',[CompetencyController::class,'get_passed_data'])->name('competency.get_passed_data');
    Route::get('/competency/passed/get_improvement_data',[CompetencyController::class,'get_improvement_data'])->name('competency.get_improvement_data');
    Route::get('/competency/passed/get_failed_data',[CompetencyController::class,'get_failed_data'])->name('competency.get_failed_data');


    // shift notes routes
    Route::get('/shift_note', [ShiftNoteController::class, 'index'])->name('shift_note');
    Route::get('/shift_note/view/{id}', [ShiftNoteController::class, 'view'])->name('shift_note.view');
    Route::get('/shift_note/view_details/{id}', [ShiftNoteController::class, 'view_details'])->name('shift_note.view_details');


    //finance module routes
    Route::get('/finance', [FinanceController::class, 'index'])->name('finance');
    Route::get('/finance/view_by_staff/{id}', [FinanceController::class, 'view_by_staff'])->name('finance.view_by_staff');
});

Route::middleware(['auth', 'role:super_admin', 'check_status'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/company', [CompanyController::class, 'index'])->name('company');
    Route::post('/company/status/{id}', [CompanyController::class, 'statusChanger'])->name('company.status');

    // Blog Routes
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');

    // Category Routes
    Route::get('/blogs_category', [CategoryController::class, 'index'])->name('blogs_category');
    Route::get('/blog_category/create', [CategoryController::class, 'create'])->name('blog_category.create');
    Route::post('/blog_category/store', [CategoryController::class, 'store'])->name('blog_category.store');
    Route::get('/blog_category/edit/{id}', [CategoryController::class, 'edit'])->name('blog_category.edit');
    Route::put('/blog_category/update/{id}', [CategoryController::class, 'update'])->name('blog_category.update');
    Route::delete('/blog_category/delete/{id}', [CategoryController::class, 'delete'])->name('blog_category.delete');
});

Route::middleware(['auth', 'role:staff_member', 'check_status'])->prefix('staff_member')->name('staff_member.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/settings/change_password', [StaffSettingController::class, 'change_password'])->name('setting.change_password');
    Route::post('/settings/update_password', [StaffSettingController::class, 'update_password'])->name('setting.update_password');
    Route::get('/view/profile', [StaffSettingController::class, 'view'])->name('view.profile');
    Route::get('/edit/profile', [StaffSettingController::class, 'edit'])->name('edit.profile');
    Route::post('/update/profile', [StaffSettingController::class, 'update'])->name('update.profile');
    Route::get('/appointments', [StaffAppointmentController::class, 'index'])->name('appointments');
    Route::get('/noticeboard', [StaffNoticeboardController::class, 'index'])->name('noticeboard');
    Route::get('/incidents/view_reports', [StaffIncidentController::class, 'view_report'])->name('incidents.view_reports');
    Route::get('/incidents/create_report', [StaffIncidentController::class, 'create_report'])->name('incidents.create_report');
    Route::post('/incidents/store_report', [StaffIncidentController::class, 'store_report'])->name('incidents.store_report');
    Route::get('/events', [StaffRoasterController::class, 'events'])->name('events');
});

Route::middleware(['auth', 'role:manager', 'check_status'])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/settings/change_password', [ManagerSettingController::class, 'change_password'])->name('setting.change_password');
    Route::post('/settings/update_password', [ManagerSettingController::class, 'update_password'])->name('setting.update_password');
    Route::get('/view/profile', [ManagerSettingController::class, 'view'])->name('view.profile');
    Route::get('/edit/profile', [ManagerSettingController::class, 'edit'])->name('edit.profile');
    Route::post('/update/profile', [ManagerSettingController::class, 'update'])->name('update.profile');

    Route::get('/appointments', [ManagerAppointmentController::class, 'index'])->name('appointments');
    Route::get('/appointments/create', [ManagerAppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments/store', [ManagerAppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/edit/{id}', [ManagerAppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('/appointments/update/{id}', [ManagerAppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('/appointments/delete/{id}', [ManagerAppointmentController::class, 'destroy'])->name('appointments.destroy');
    Route::get('/appointments/get-staff-by-team', [ManagerAppointmentController::class, 'getStaffByTeam'])->name('appointments.getStaffByTeam');


    //team create read update delete
    Route::get('/team', [ManagerTeamController::class, 'index'])->name('team');
    Route::get('/team/create', [ManagerTeamController::class, 'create'])->name('team.create');
    Route::post('/team/store', [ManagerTeamController::class, 'store'])->name('team.store');
    Route::get('/team/edit/{id}', [ManagerTeamController::class, 'edit'])->name('team.edit');
    Route::put('/team/update/{id}', [ManagerTeamController::class, 'update'])->name('team.update');
    Route::delete('/team/delete/{id}', [ManagerTeamController::class, 'delete'])->name('team.delete');

    //create read update delete for shift_type
    Route::get('/shift_type', [ManagerShiftTypeController::class, 'index'])->name('shift_type');
    Route::get('/shift_type/create', [ManagerShiftTypeController::class, 'create'])->name('shift_type.create');
    Route::post('/shift_type/store', [ManagerShiftTypeController::class, 'store'])->name('shift_type.store');
    Route::get('/shift_type/edit/{id}', [ManagerShiftTypeController::class, 'edit'])->name('shift_type.edit');
    Route::put('/shift_type/update/{id}', [ManagerShiftTypeController::class, 'update'])->name('shift_type.update');
    Route::delete('/shift_type/delete/{id}', [ManagerShiftTypeController::class, 'delete'])->name('shift_type.delete');


    //create read update delete for staff
    Route::get('/staff', [ManagerStaffController::class, 'index'])->name('staff');
    Route::get('/staff/create', [ManagerStaffController::class, 'create'])->name('staff.create');
    Route::post('/staff/store', [ManagerStaffController::class, 'store'])->name('staff.store');
    Route::get('/staff/edit/{id}', [ManagerStaffController::class, 'edit'])->name('staff.edit');
    Route::get('/staff/view/{id}', [ManagerStaffController::class, 'view'])->name('staff.view');
    Route::post('/staff/update/{id}', [ManagerStaffController::class, 'update'])->name('staff.update');
    Route::delete('/staff/delete/{id}', [ManagerStaffController::class, 'delete'])->name('staff.delete');

    //create read update delete for pay_rate
    Route::get('/pay_rate', [ManagerPayRateController::class, 'index'])->name('pay_rate');
    Route::get('/pay_rate/create', [ManagerPayRateController::class, 'create'])->name('pay_rate.create');
    Route::post('/pay_rate/store', [ManagerPayRateController::class, 'store'])->name('pay_rate.store');
    Route::get('/pay_rate/edit/{id}', [ManagerPayRateController::class, 'edit'])->name('pay_rate.edit');
    Route::get('/pay_rate/view/{id}', [ManagerPayRateController::class, 'view'])->name('pay_rate.view');
    Route::post('/pay_rate/update/{id}', [ManagerPayRateController::class, 'update'])->name('pay_rate.update');
    Route::delete('/pay_rate/delete/{id}', [ManagerPayRateController::class, 'delete'])->name('pay_rate.delete');


    //create read update delete for patient
    Route::get('/patient', [ManagerPatientController::class, 'index'])->name('patient');
    Route::get('/patient/create', [ManagerPatientController::class, 'create'])->name('patient.create');
    Route::post('/patient/store', [ManagerPatientController::class, 'store'])->name('patient.store');
    Route::get('/patient/edit/{id}', [ManagerPatientController::class, 'edit'])->name('patient.edit');
    Route::get('/patient/view/{id}', [ManagerPatientController::class, 'view'])->name('patient.view');
    Route::put('/patient/update/{id}', [ManagerPatientController::class, 'update'])->name('patient.update');
    Route::delete('/patient/delete/{id}', [ManagerPatientController::class, 'delete'])->name('patient.delete');


    //create read update delete for Noticeboard
    Route::get('/noticeboard', [ManagerNoticeboardController::class, 'index'])->name('noticeboard');
    Route::get('/noticeboard/create', [ManagerNoticeboardController::class, 'create'])->name('noticeboard.create');
    Route::post('/noticeboard/store', [ManagerNoticeboardController::class, 'store'])->name('noticeboard.store');
    Route::get('/noticeboard/edit/{id}', [ManagerNoticeboardController::class, 'edit'])->name('noticeboard.edit');
    Route::put('/noticeboard/update/{id}', [ManagerNoticeboardController::class, 'update'])->name('noticeboard.update');
    Route::delete('/noticeboard/delete/{id}', [ManagerNoticeboardController::class, 'delete'])->name('noticeboard.delete');



    //manager roaster module
    Route::get('/roaster', [ManagerRoasterController::class, 'index'])->name('roaster');
    Route::post('/roaster/event_store', [ManagerRoasterController::class, 'event_store'])->name('roaster.store');
    Route::delete('/roaster/delete/{id}', [ManagerRoasterController::class, 'delete'])->name('roaster.delete');
    Route::post('/roaster/event_edit/{id}', [ManagerRoasterController::class, 'event_edit'])->name('roaster.edit');
    Route::post('/roaster/publish_events/{id}', [ManagerRoasterController::class, 'publish_events'])->name('roaster.publish');
    Route::get('/pay_rates', [ManagerRoasterController::class, 'pay_rates'])->name('pay_rates');
    Route::get('/events', [ManagerRoasterController::class, 'events'])->name('events');


    //create read update delete for routines
    Route::get('/routines', [ManagerRoutineController::class, 'index'])->name('routines');
    Route::get('/routines/view/{patient}', [ManagerRoutineController::class, 'view'])->name('routines.view');
    Route::get('/routines/create', [ManagerRoutineController::class, 'create'])->name('routines.create');
    Route::post('/routines/store', [ManagerRoutineController::class, 'store'])->name('routines.store');
    Route::get('/routines/edit/{id}', [ManagerRoutineController::class, 'edit'])->name('routines.edit');
    Route::put('/routines/update/{id}', [ManagerRoutineController::class, 'update'])->name('routines.update');
    Route::delete('/routines/delete/{id}', [ManagerRoutineController::class, 'destroy'])->name('routines.destroy');

    //create read update delete for medications
    Route::get('/medications', [ManagerMedicationController::class, 'index'])->name('medications');
    Route::get('/medications/view/{patient}', [ManagerMedicationController::class, 'view'])->name('medications.view');
    Route::get('/medications/create', [ManagerMedicationController::class, 'create'])->name('medications.create');
    Route::post('/medications', [ManagerMedicationController::class, 'store'])->name('medications.store');
    Route::get('/medications/edit/{id}', [ManagerMedicationController::class, 'edit'])->name('medications.edit');
    Route::put('/medications/update/{id}', [ManagerMedicationController::class, 'update'])->name('medications.update');
    Route::delete('/medications/delete/{id}', [ManagerMedicationController::class, 'destroy'])->name('medications.destroy');


    //create read update delete for observation
    Route::get('/observation', [ManagerObservationController::class, 'index'])->name('observation');
    Route::get('/observation/view/{patient}', [ManagerObservationController::class, 'view'])->name('observation.view');
    Route::get('/observation/create', [ManagerObservationController::class, 'create'])->name('observation.create');
    Route::post('/observation/store', [ManagerObservationController::class, 'store'])->name('observation.store');
    Route::get('/observation/edit/{id}', [ManagerObservationController::class, 'edit'])->name('observation.edit');
    Route::put('/observation/update/{id}', [ManagerObservationController::class, 'update'])->name('observation.update');
    Route::delete('/observation/delete/{id}', [ManagerObservationController::class, 'destroy'])->name('observation.destroy');

    //list and view of care plan
    Route::get('/careplan', [ManagerCarePlanController::class, 'index'])->name('careplan');
    Route::get('/careplan/view/{id}', [ManagerCarePlanController::class, 'view'])->name('careplan.view');

    //shift notes manager module
    Route::get('/shift_note', [ManagerShiftNoteController::class, 'index'])->name('shift_note');
    Route::get('/shift_note/view/{id}', [ManagerShiftNoteController::class, 'view'])->name('shift_note.view');
    Route::get('/shift_note/view_details/{id}', [ManagerShiftNoteController::class, 'view_details'])->name('shift_note.view_details');


    //audit create update delete and list for manager
    Route::get('/audit', [ManagerAuditController::class, 'index'])->name('audit');
    Route::get('/audit/create', [ManagerAuditController::class, 'create'])->name('audit.create');
    Route::post('/audit/store', [ManagerAuditController::class, 'store'])->name('audit.store');
    Route::get('/audit/edit/{id}', [ManagerAuditController::class, 'edit'])->name('audit.edit');
    Route::post('/audit/update/{id}', [ManagerAuditController::class, 'update'])->name('audit.update');
    Route::delete('/audit/delete/{id}', [ManagerAuditController::class, 'delete'])->name('audit.delete');


     // competency manager routes

     Route::get('/competency/passed',[ManagerCompetencyController::class,'competency_pass'])->name('competency.passed');
     Route::get('/competency/improvement',[ManagerCompetencyController::class,'competency_improvement'])->name('competency.improvement');
     Route::get('/competency/failed',[ManagerCompetencyController::class,'competency_failed'])->name('competency.failed');
     Route::get('/competency/passed/get_passed_data',[ManagerCompetencyController::class,'get_passed_data'])->name('competency.get_passed_data');
     Route::get('/competency/passed/get_improvement_data',[ManagerCompetencyController::class,'get_improvement_data'])->name('competency.get_improvement_data');
     Route::get('/competency/passed/get_failed_data',[ManagerCompetencyController::class,'get_failed_data'])->name('competency.get_failed_data');


      //Risk Assessment module
    Route::get('/risk_assessment/template/create', [ManagerRiskAssessmentController::class, 'template_create'])->name('risk_assessment.template.create');
    Route::get('/risk_assessment', [ManagerRiskAssessmentController::class, 'index'])->name('risk_assessment');
    Route::get('/risk_assessment/view/{id}', [ManagerRiskAssessmentController::class, 'view'])->name('risk_assessment.view');
    Route::get('/risk_assessment/view_assessment/{id}', [ManagerRiskAssessmentController::class, 'view_assessment'])->name('risk_assessment.view_assessment');
    Route::get('/risk_assessment/create', [ManagerRiskAssessmentController::class, 'create'])->name('risk_assessment.create');
    Route::post('/risk_assessment/store', [ManagerRiskAssessmentController::class, 'store'])->name('risk_assessment.store');
    Route::get('/risk_assessment/edit/{id}', [ManagerRiskAssessmentController::class, 'edit'])->name('risk_assessment.edit');
    Route::post('/risk_assessment/update/{id}', [ManagerRiskAssessmentController::class, 'update'])->name('risk_assessment.update');
    Route::delete('/risk_assessment/delete/{id}', [ManagerRiskAssessmentController::class, 'destroy'])->name('risk_assessment.delete');

    Route::get('/template', [ManagerRiskAssessmentController::class, 'template_list'])->name('template');
    Route::post('/risk_assessment/template_store', [ManagerRiskAssessmentController::class, 'template_store'])->name('risk_assessment.template_store');
    Route::get('/risk_assessment/template', [ManagerRiskAssessmentController::class, 'template'])->name('risk_assessment.template');
    Route::get('/risk_assessment/template_edit/{id}', [ManagerRiskAssessmentController::class, 'template_edit'])->name('risk_assessment.template_edit');
    Route::post('/template/update/{id}', [ManagerRiskAssessmentController::class, 'template_update'])->name('risk_assessment.template_update');
    Route::delete('/template/delete/{id}', [ManagerRiskAssessmentController::class, 'template_delete'])->name('risk_assessment.template_delete');


});

Route::middleware(['auth', 'role:patient', 'check_status'])->prefix('patient')->name('patient.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/settings/change_password', [PatientSettingController::class, 'change_password'])->name('setting.change_password');
    Route::post('/settings/update_password', [PatientSettingController::class, 'update_password'])->name('setting.update_password');
    Route::get('/view/profile', [PatientSettingController::class, 'view'])->name('view.profile');
    Route::get('/edit/profile', [PatientSettingController::class, 'edit'])->name('edit.profile');
    Route::post('/update/profile', [PatientSettingController::class, 'update'])->name('update.profile');
    Route::get('/appointments', [PatientAppointmentController::class, 'index'])->name('appointments');

    // Reviews
    Route::get('/reviews', [PatientReviewController::class, 'create'])->name('reviews');
    Route::post('/reviews', [PatientReviewController::class, 'store'])->name('reviews.store');

    Route::get('/events', [PatientRoasterController::class, 'events'])->name('events');
});

// NOTIFICATIONS

Route::put('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsUnread');
Route::get('/privacy-policy',[PrivacyPolicyController::class,'privacy'])->name('privacy');


Auth::routes();
