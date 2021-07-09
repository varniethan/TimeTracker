<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Employer_Dashboard;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\EmployeeController;
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

//Auth for all
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'destroy']) ->name('logout');
    Route::get('/dashboard/profile', [UserController::class,'profile'])->name('profile');
    Route::get('/dashboard/profile/edit', [UserController::class,'getEditProfile'])->name('edit_profile');
    Route::post('/profile_edit', [UserController::class,'update']);
    Route::get('/dashboard/company', [OrganisationController::class,'viewCompany']);
    /*Route::get('/dashboard/company/add', [OrganisationController::class,'create'])->name('register');*/
    Route::get('/add', [OrganisationController::class,'create'])->name('register');
    Route::post('/company_add', [OrganisationController::class,'add']);

//    Route::get('/employee/create', [EmployeeController::class,'create'])->name('register');
//    Route::post('/employee/', [EmployeeController::class,'add']);
});

//Guest for all
Route::group(['middleware' => ['guest']], function() {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

//APIs and AJAX Calls
Route::get('/getCities/{id}', [CountryController::class,'getCities']);

//Resources - perform the same sets of actions against each resource in your application.Because of this common use case, Laravel resource routing assigns the typical create, read, update, and delete ("CRUD") routes to a controller with a single line of code.
Route::resources([
    'employee' => EmployeeController::class,
]);

//Tests:
/*Route::view('/timeoff','tracker.timeoff');*/
Route::view('/timeoff','employee.add_employee');
Route::get('/session/get', [SessionController::class,'getSessionData'])->name('session.get');
Route::get('/session/set', [SessionController::class,'storeSessionData'])->name('session.store');
Route::get('/session/remove', [SessionController::class,'deleteSessionData'])->name('session.delete');
Route::get('tests', [UserController::class,'profile'])->name('profile');
Route::get('/org', [Employer_Dashboard::class,'index'])->name('profile');
Route::get('/citytest', [CountryController::class,'index']);

//Email;
Route::get('/send-email', [MailController::class,'sendEmail']);


//DB Tests
Route::get('/dbtest', [CountryController::class,'getCountry']);
Route::get('/test1', function () {
    return view('employee.index');
});
