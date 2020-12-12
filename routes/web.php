<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource("profiles" , App\Http\Controllers\ProfileController::class);

Route::resource("applications" , App\Http\Controllers\ApplicationController::class);

Route::resource("languages" , App\Http\Controllers\LanguageController::class);
Route::get('/user/language/{id}', [App\Http\Controllers\LanguageController::class, 'userLanguages'])->name('user.languages');


Route::resource("educations" , App\Http\Controllers\EducationController::class);
Route::get('/user/education/{id}', [App\Http\Controllers\EducationController::class, 'userEducation'])->name('user.education');

