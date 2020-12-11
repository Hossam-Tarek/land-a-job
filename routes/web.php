<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\CareerLevelController;
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


// Route::get('/', function () {
//     return view('layouts.app');
// });


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function(){
    Route::resource('jobs',JobController::class);
    Route::resource('skills',SkillController::class);
    Route::resource('countries',CountryController::class);
    Route::resource('jobTypes',JobTypeController::class);
    Route::resource('careerLevels',CareerLevelController::class);
});
