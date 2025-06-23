<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/greeting', function () {
    return 'Hello World';
});

//AUTH
Route::redirect('/admin/login', '/login');
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

//POST
Route::middleware('auth')->group(function () {
    Route::get('/admin/post', [PostController::class, 'index'])->name('admin.post.index');
    Route::get('/admin/post/create', function () {
        return view('createPost');
    })->name('createPost');
    Route::post('/admin/post/create', [PostController::class, 'store']);
});
