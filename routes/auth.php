<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\admin\BlogController as AdminBlogController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/about', function(){
        return view('about');
    })->name('about');

    Route::get('contact', [ContactController::class, 'index'])->name('contact');

    Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');

    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');


        // Blogs
    Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->name('admin.blogs');

    Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->name('admin.blogs.create');

    Route::post('/admin/blogs/store', [AdminBlogController::class, 'store'])->name('admin.blogs.store');

    Route::get('/admin/blogs/edit/{id}', [AdminBlogController::class, 'edit'])->name('admin.blogs.edit');

    Route::post('/admin/blogs/update/{id}', [AdminBlogController::class, 'update'])->name('admin.blogs.update');

    Route::get('/admin/blogs/delete/{id}', [AdminBlogController::class, 'destroy'])->name('admin.blogs.delete');
});
