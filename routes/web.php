<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\AppController;
use GuzzleHttp\Psr7\Query;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/resources', function(){ return view('resources'); })->name('resources');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');

// Application routes
Route::group(['middleware' => 'auth', 'prefix' => 'app'], function () {
    Route::get('/home', function(){ return view('app.home'); })->name('app.home');
    Route::get('/settings', function(){ return view('app.settings'); })->name('app.settings');
});

//post routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');