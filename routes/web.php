<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CertificateController;
use \App\Http\Controllers\JobTitleController;
use \App\Http\Controllers\LinkController;
use \App\Http\Controllers\PhoneNumberController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('users',UserController::class);
Route::resource('/certificates',CertificateController::class);
Route::resource('job-titles',JobTitleController::class);
Route::resource('links',LinkController::class);
Route::resource('phones',PhoneNumberController::class);

Route::prefix('admin')->group(function(){
    Route::resource('jobs',JobController::class);
    Route::resource('skills',SkillController::class);
    Route::resource('countries',CountryController::class);
    Route::resource('jobTypes',JobTypeController::class);
    Route::resource('careerLevels',CareerLevelController::class);
    Route::view('/','admin.index');
});

Route::resource("/companies", \App\Http\Controllers\CompanyController::class);

Route::resource("/cities", \App\Http\Controllers\CityController::class);

Route::resource("/industry-categories", \App\Http\Controllers\IndustryCategoryController::class);

Route::resource("/number-of-employees", \App\Http\Controllers\NumberOfEmployeeController::class);

Route::prefix("company")->group(function () {
    Route::get("/", [\App\Http\Controllers\Company\CompanyController::class, "index"])
        ->name("company");
    Route::get("/profile", [\App\Http\Controllers\Company\CompanyController::class, "show"])
        ->name("company.profile");
});

Route::prefix("user")->group(function () {
    Route::get("/", [\App\Http\Controllers\User\UserController::class, "index"])
        ->name("user");
});

Route::resource("profiles" , App\Http\Controllers\ProfileController::class);

Route::resource("applications" , App\Http\Controllers\ApplicationController::class);

Route::resource("languages" , App\Http\Controllers\LanguageController::class);

Route::get('/user/language/{id}', [App\Http\Controllers\LanguageController::class, 'userLanguages'])->name('user.languages');

Route::resource("educations" , App\Http\Controllers\EducationController::class);

Route::get('/user/education/{id}', [App\Http\Controllers\EducationController::class, 'userEducation'])->name('user.education');
