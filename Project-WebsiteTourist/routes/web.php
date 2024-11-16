<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Các route công khai (ví dụ: đăng ký)
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Các route yêu cầu xác thực
// Route::middleware('auth')->group(function () {
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/destinations', [HomeController::class, 'destinations'])->name('destinations');
Route::get('/tour', [TourController::class, 'tour'])->name('tours.tour');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/profile/bookings', [UserController::class, 'bookings'])->name('profile.bookings');

Route::get('/admin-dashboard', function () {
    return view('contact');
})->middleware('check.role:admin')->name('admin.dashboard');

Route::get('/tours/{id}', [TourController::class, 'show'])->name('tours.show');
Route::post('/tours/{id}', [TourController::class, 'book'])->name('tours.book');


// });
