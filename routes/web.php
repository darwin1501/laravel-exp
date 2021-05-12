<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProjectsController;

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
//named routes used in <x-nav-link :href=route('home')>
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Route::get('/project/{section}', function ($section) {
//     return $section;
// });


Route::get('/about', function() {
    return view('pages.about');
})->name('about');

Route::get('/projects',[PagesController::class,'showProjects']);

Route::resource('projects', ProjectsController::class);

// the laravel breeze overwrite the resource routes
// procedure to access the routes
// example = projects.index, projects.show

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', DashboardController::class)
->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
