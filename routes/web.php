<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AboutUsController;

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
// Route for the index view
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/order/accept/{id}/{uid}', [DashboardController::class, 'acceptOrder'])->name('admin.order.accept');
    Route::get('/order/reject/{id}/{uid}', [DashboardController::class, 'rejectOrder'])->name('admin.order.reject');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/contactus', [ContactUsController::class, 'index'])->name('contactus');
    Route::post('/contactus', [ContactUsController::class, 'store'])->name('contactus.store');
    Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
});

// Route for the login page
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route for the signup page
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route for the logout page
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');