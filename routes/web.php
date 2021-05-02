<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CountryController;
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

//auth for all
Route::group(['middleware'=> ['auth']],function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
});

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest');

Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest');

Route::get('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/dashboard/profile', [UserController::class,'profile'])->name('profile')->middleware(['auth']);


//Edit Profile
Route::get('/dashboard/profile/edit', [UserController::class,'getEditProfile'])->name('edit_profile');
Route::post('/edit', [UserController::class,'update'])->middleware(['auth']);

//Tests:
Route::view('/timeoff','tracker.timeoff');
Route::get('/session/get', [SessionController::class,'getSessionData'])->name('session.get');
Route::get('/session/set', [SessionController::class,'storeSessionData'])->name('session.store');
Route::get('/session/remove', [SessionController::class,'deleteSessionData'])->name('session.delete');
Route::get('tests', [UserController::class,'profile'])->name('profile');
Route::get('/citytest', [CountryController::class,'index']);
Route::get('/getCities/{id}', [RegisterController::class,'getCities']);
//Email;
Route::get('/send-email', [MailController::class,'sendEmail']);
