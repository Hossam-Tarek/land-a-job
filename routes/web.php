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

Route::resource("/companies", \App\Http\Controllers\CompanyController::class);

Route::resource("/cities", \App\Http\Controllers\CityController::class);

Route::resource("/industry-categories", \App\Http\Controllers\IndustryCategoryController::class);

Route::resource("/number-of-employees", \App\Http\Controllers\NumberOfEmployeeController::class);
