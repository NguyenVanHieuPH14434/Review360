<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use App\Http\Controllers\JobTitleController;

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

Route::get('/', [HomeController::class, 'index']);

// job title 
Route::prefix("/job-title")->controller(JobTitleController::class)->name("jobTitle.")->group(function(){
    Route::get('/', 'index')->name('list');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/edit/{id}', 'update')->name('update');
    Route::get('/detail/{id}', 'show')->name('show');
    Route::get('/search', 'search')->name('search');
    Route::get('/import', 'importView')->name('importView');
    Route::post('/import', 'import')->name('import');
});
