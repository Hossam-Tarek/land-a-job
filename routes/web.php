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


// profile route 
use App\Http\Controllers\ProfileController;
Route::resource("profiles" , ProfileController::class);

//application controller
use App\Http\Controllers\ApplicationController;
Route::resource("applications" , ApplicationController::class);

//language controller
use App\Http\Controllers\LanguageController;
Route::resource("languages" , LanguageController::class);