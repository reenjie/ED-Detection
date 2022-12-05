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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;    
use App\Http\Controllers\SpeciesController;   
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\SymptomsController;
use App\Http\Controllers\MessageController;


        
  


Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('guest');
	Route::get('/search', [HomeController::class, 'search'])->name('search')->middleware('guest');
	Route::get('/googlesearch', [HomeController::class, 'googlesearch'])->name('googlesearch')->middleware('guest');
	Route::get('/Back', [HomeController::class, 'Back'])->name('Back')->middleware('guest');
	Route::get('/Result/View', [HomeController::class, 'ResultView'])->name('view')->middleware('guest');
	

	//species
	Route::get('Species',[SpeciesController::class,'index'])->name('species');
	Route::post('Species',[SpeciesController::class,'store'])->name('addspecies');
	Route::post('Species/Edit',[SpeciesController::class,'edit'])->name('editspecies');

	Route::get('Species/Delete',[SpeciesController::class,'destroy'])->name('deletespecies');


	//Disease

	Route::get('Diseases',[DiseaseController::class,'index'])->name('disease');
	Route::get('Diseases/Manage',[DiseaseController::class,'sort'])->name('sortdisease');
	Route::get('reset',[DiseaseController::class,'resetSort'])->name('resetSelection');

	Route::post('AddDisease',[DiseaseController::class,'store'])->name('adddisease');
	Route::post('Addsymptoms',[SymptomsController::class,'store'])->name('addsymptom');

	Route::get('deletedisease',[DiseaseController::class,'destroy'])->name('deletedisease');

	Route::get('upt',[DiseaseController::class,'updateText'])->name('updatetext');
	


	//Consultation
	Route::get('Consultation',[ConsultationController::class,'index'])->name('consultation');
	
	Route::post('Consultation',[ConsultationController::class,'store'])->name('addconsultation');

	Route::get('Select',[ConsultationController::class,'open'])->name('open');

	Route::get('reselSelections',[ConsultationController::class,'reset'])->name('reselSelections');
	
	
	Route::get('updateconsult',[ConsultationController::class,'update'])->name('updateconsult');
	

	//Messages
	Route::get('xwq',[MessageController::class,'index'])->name('fetchmessage');

	Route::get('send',[MessageController::class,'store'])->name('sendmessage');

	Route::get('Deletemessage',[MessageController::class,'destroy'])->name('deletemessage');
	
	
Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

	








});