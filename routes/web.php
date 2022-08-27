<?php

use App\Http\Controllers\AuthControllers\ForgotPasswordController;
use App\Http\Controllers\AuthControllers\LoginController;
use App\Http\Controllers\AuthControllers\LogoutController;
use App\Http\Controllers\AuthControllers\RegisterController;
use App\Http\Controllers\AuthControllers\ResetPasswordController;
use App\Http\Controllers\BackendControllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth', 'namespace' => 'AuthControllers'], function () {
    Route::get('/login', [LoginController::class, 'getLogin'])->name('get.login');
    Route::post('/login', [LoginController::class, 'postLogin'])->name('post.login');

    Route::get('/logout', [LogoutController::class, 'getLogout'])->name('get.logout');
    Route::post('/logout', [LogoutController::class, 'postLogout'])->name('post.logout');

    Route::get('/register', [RegisterController::class, 'getRegister'])->name('get.register');
    Route::post('/register', [RegisterController::class, 'postRegister'])->name('post.register');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'getForgotPassword'])->name('get.forgot.password');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'postForgotPassword'])->name('post.forgot.password');

    Route::get('/reset-password', [ResetPasswordController::class, 'getResetPassword'])->name('get.reset.password');
    Route::post('/reset-password', [ResetPasswordController::class, 'postResetPassword'])->name('post.reset.password');

});

Route::group(['prefix' => 'backend', 'namespace' => 'BackendControllers'], function () {
    Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('get.dashboard');
});

















