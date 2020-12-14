<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CertificateController;
use \App\Http\Controllers\JobtitleController;
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
//Route::post('/login/company',[\App\Http\Controllers\Auth\LoginController::class,'login']);

//Route::post('/login/bbb',[\App\Http\Controllers\Auth\LoginController::class,'logincompany']);
//
//Route::group(['middleware'=>'auth'],function (){
//    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//});
//

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users',UserController::class);
Route::resource('/certificates',CertificateController::class);
Route::resource('job-titles',JobtitleController::class);
Route::resource('links',LinkController::class);
Route::resource('phones',PhoneNumberController::class);
Route::get('/company/register',function (){
    return view('auth.company-register');
})->name('company-register');
Route::get('/login',function (){
    return view('auth.login');
})->name('login');
Route::get('/register',function (){
    return view('auth.register');
})->name('register');


Route::get('login/{{website}}',[\App\Http\Controllers\Auth\LoginController::class,'redirectToProvider'])->name('google.login');
Route::get('login/{website}/callback',[\App\Http\Controllers\Auth\LoginController::class,'handleProviderCallback']);

Route::prefix('admin')->group(function(){
    Route::resource('jobs',JobController::class);
    Route::resource('skills',SkillController::class);
    Route::resource('countries',CountryController::class);
    Route::resource('jobTypes',JobTypeController::class);
    Route::resource('careerLevels',CareerLevelController::class);
});



Route::resource("/companies", \App\Http\Controllers\CompanyController::class);

Route::resource("/cities", \App\Http\Controllers\CityController::class);

Route::resource("/industry-categories", \App\Http\Controllers\IndustryCategoryController::class);

Route::resource("/number-of-employees", \App\Http\Controllers\NumberOfEmployeeController::class);

