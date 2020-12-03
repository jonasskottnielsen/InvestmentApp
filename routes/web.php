<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PageController;

Route::get('/dashboard', [DashboardController::class, 'index'])-> name('dashboard');
// register
Route::get('/register', [RegisterController::class, 'index'])-> name('register');
Route::post('/register', [RegisterController::class, 'store']);
// login
Route::get('/login', [LoginController::class, 'index'])-> name('login');
Route::post('/login', [LoginController::class, 'loginfunc']);
//logout
Route::post('/logout', [LogoutController::class, 'logoutfunc'])-> name('logout');

Route::get('/welcome', [PageController::class, 'index'])-> name('welcome');

Route::get('/pages', function () {
    return view('pages.welcome');
});
Route::get('/p2p', function () {
    return view('pages.p2p');
});
Route::get('/aktiebeholdning', function () {
    return view('pages.aktiebeholdning');
});
