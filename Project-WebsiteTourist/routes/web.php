<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PostController;

// Đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Đăng ký
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Các route chính cho người dùng
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/destinations', [HomeController::class, 'destinations'])->name('destinations');
Route::get('/tour', [TourController::class, 'tour'])->name('tours.tour');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');




// Hồ sơ người dùng
Route::middleware(['auth'])->group(function () {
    // Các route profile hiện tại
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/bookings', [UserController::class, 'bookings'])->name('profile.bookings');
    Route::post('/users/update', [UserController::class, 'updateAjax'])->name('users.update.ajax');
    Route::post('/users/update-avt', [UserController::class, 'updateAvatar'])->name('users.update-avt');
    
    // Thêm các route mới cho password
    Route::post('/profile/change-password', [UserController::class, 'changePassword'])->name('profile.change.password');
});

// Hiển thị form nhập email để quên mật khẩu
Route::get('/password/forgot', [UserController::class, 'showForgotPasswordForm'])->name('password.request');

// Xử lý gửi yêu cầu quên mật khẩu
Route::post('/password/forgot', [UserController::class, 'forgotPassword'])->name('password.forgot');

// Hiển thị form đặt lại mật khẩu
Route::get('/password/reset/{token}', [UserController::class, 'showResetPasswordForm'])->name('password.reset.form');

// Xử lý đặt lại mật khẩu
Route::post('/password/reset', [UserController::class, 'resetPassword'])->name('password.reset');

 
Route::middleware(['auth', 'check.role:admin'])->group(function () {
    // Dashboard admin
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Destroy (xóa) user và tour
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::delete('/admin/tours/{id}', [AdminController::class, 'destroyTour'])->name('admin.tours.destroy');

    // Store user và tour (tạo mới)
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::post('/admin/tours', [AdminController::class, 'storeTour'])->name('admin.tours.store');

    // Update user và tour (cập nhật)
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::put('/admin/tours/{id}', [AdminController::class, 'updateTour'])->name('admin.tours.update');

    
    Route::patch('/admin/posts/{id}/approve', [AdminController::class, 'approvePost'])->name('admin.posts.approve');
    Route::delete('/admin/posts/{id}', [AdminController::class, 'destroyPost'])->name('admin.posts.destroy');
});

// Tour
Route::get('/tours/{id}', [TourController::class, 'show'])->name('tours.show');
Route::post('/tours/{id}', [TourController::class, 'book'])->name('tours.book');


Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::post('/posts/like/{id}', [PostController::class, 'like'])->name('posts.like');
Route::post('/posts/{postId}/comment', [PostController::class, 'storeComment'])->name('comments.store');