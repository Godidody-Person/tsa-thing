<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ResourceController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/resources', [ResourceController::class, 'loadResourcesPage'])->name('resources');

Route::get('/events', [ResourceController::class, 'loadEventsPage'])->name('events');
Route::get('/programs', [ResourceController::class, 'loadProgramsPage'])->name('programs');
Route::get('/nonprofits', [ResourceController::class, 'loadNonprofitsPage'])->name('nonprofits');
Route::get('/clubs', [ResourceController::class, 'loadClubsPage'])->name('clubs');
Route::get('/businesses', [ResourceController::class, 'loadBusinessesPage'])->name('businesses');
Route::get('/resource/view/{id}', [ResourceController::class, 'viewResource'])->name('resource.view');

Route::get('/profile/{id}', [AuthController::class, 'viewProfile'])->name('app.profile');

Route::get('/search', [ResourceController::class, 'search'])->name('search');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');

// Application routes
Route::group(['middleware' => 'auth', 'prefix' => 'app'], function () {
    Route::get('/home', function(){ return view('app.home'); })->name('app.home');
    Route::get('/settings', function(){ return view('app.settings'); })->name('app.settings');
   
    Route::get('/create', function(){ return view('app.create'); })->name('app.createPage');

    Route::get('/resources', function(){ return view('app.resources'); })->name('app.resources');
    Route::get('/resource/edit/{id}', [ResourceController::class, 'editResource'])->name('app.resource.edit');

    //post
    Route::post('/create', [ResourceController::class, 'create'])->name('app.create');

    Route::put('/resource/edit/{id}', [ResourceController::class, 'updateResource'])->name('app.resource.edit');
    Route::delete('/resource/delete/{id}', [ResourceController::class, 'deleteResource'])->name('app.resource.delete');
});

//post routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');