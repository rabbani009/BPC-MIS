<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers\{
    ForgotPasswordController,
    LoginController,
    LogoutController,
    RegisterController,
    ResetPasswordController,
};
use App\Http\Controllers\BackendControllers\{
    ActivityController,
    AjaxController,
    AssociationController,
    CouncilController,
    DashboardController,
    ProfileController,
    ProgramController,
    TraineeController,
    TrainerController,
    UserController,
    ReportController
};

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

Route::get('/', [HomeController::class, 'getHome'])->name('home');

Route::group(['namespace' => 'AuthControllers'], function () {
    Route::get('login', [LoginController::class, 'getLogin'])->name('get.login');
    Route::post('login', [LoginController::class, 'postLogin'])->name('post.login');

    Route::get('logout', [LogoutController::class, 'getLogout'])->name('get.logout');
    Route::post('logout', [LogoutController::class, 'postLogout'])->name('post.logout');

    Route::get('register', [RegisterController::class, 'getRegister'])->name('get.register');
    Route::post('register', [RegisterController::class, 'postRegister'])->name('post.register');

    Route::get('forgot-password', [ForgotPasswordController::class, 'getForgotPassword'])->name('get.forgot.password');
    Route::post('forgot-password', [ForgotPasswordController::class, 'postForgotPassword'])->name('post.forgot.password');

    Route::get('reset-password', [ResetPasswordController::class, 'getResetPassword'])->name('get.reset.password');
    Route::post('reset-password', [ResetPasswordController::class, 'postResetPassword'])->name('post.reset.password');
});


Route::group(['prefix' => 'backend', 'middleware' => 'authenticated'], function () {
    Route::get('dashboard', [DashboardController::class, 'getDashboard'])->name('get.dashboard');

    Route::resource('activity', ActivityController::class);
    Route::get('activity-console/{activity?}', [ActivityController::class, 'getActivityConsole'])->name('get.activity.console');
    Route::patch('activity-console/{activity}', [ActivityController::class, 'patchActivityConsole'])->name('patch.activity.console');

    Route::resource('council', CouncilController::class);
    Route::resource('association', AssociationController::class);

    Route::resource('program', ProgramController::class);

    Route::resource('trainer', TrainerController::class);
    Route::resource('trainee', TraineeController::class);

    Route::resource('profile', ProfileController::class);
    Route::resource('user', UserController::class);

    //Report
    Route::get('report/program-wise',[ReportController::class, 'ProgramReportView'])->name('program.report');
    Route::get('report/trainee-info-report',[ReportController::class, 'traineeReportView'])->name('trainee.report');
    Route::get('report/trainer-info-report',[ReportController::class, 'trainerReportView'])->name('trainer.report');

    Route::match(array('GET','POST'),'report/index',[ReportController::class, 'index'])->name('search.index');

    Route::match(array('GET','POST'),'report/trainer',[ReportController::class, 'trainer'])->name('report.trainer');

    Route::match(array('GET','POST'),'report/trainee',[ReportController::class, 'trainee'])->name('report.trainee');



    //All ajax routes will be in this route group
    Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function (){
        Route::post('get-associations-by-council', [AjaxController::class, 'getAssociationsByCouncil'])->name('get-associations-by-council');
        Route::post('get-trainers-by-council-and-association', [AjaxController::class, 'getTrainersByCouncilAndAssociation'])->name('get-trainers-by-council-and-association');
        Route::post('get-trainers-by-association', [AjaxController::class, 'getTrainersByAssociation'])->name('get-trainers-by-association');
        Route::post('get-activities-by-council-and-association', [AjaxController::class, 'getActivitiesByCouncilAndAssociation'])->name('get-activities-by-council-and-association');
        Route::post('get-days-by-activity', [AjaxController::class, 'getDaysByActivity'])->name('get-days-by-activity');
    });

});

















