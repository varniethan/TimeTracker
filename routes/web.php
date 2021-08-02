<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PositionsController;
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
    Route::view('/dashboard/account','dashboard.account');
    Route::get('/logout', [LoginController::class, 'destroy']) ->name('logout');

    Route::get('/dashboard/account/positions',[PositionsController::class, 'index']);
    Route::post('/positions',[PositionsController::class, 'store']);
    Route::get('/edit-profile', [UserController::class,'showEditProfile'])->name('edit-profile');
    Route::post('/edit-profile', [UserController::class,'edit']);
    Route::get('/profile', [UserController::class,'profile'])->name('profile');
    Route::get('/edit-profile', [UserController::class,'showEditProfile'])->name('edit-profile');
    Route::post('/edit-profile', [UserController::class,'edit']);


    Route::get('/dashboard/company', [OLDOrganisationController::class,'viewCompany']);
    /*Route::get('/dashboard/company/add', [OLDOrganisationController::class,'create'])->name('register');*/
    Route::get('/add', [OLDOrganisationController::class,'create'])->name('register');
    Route::post('/company_add', [OLDOrganisationController::class,'add']);
//    Route::get('/employee/create', [OldEmployeeController::class,'create'])->name('register');
//    Route::post('/employee/', [OldEmployeeController::class,'add']);
});

//Guest for all
Route::group(['middleware' => ['guest']], function() {
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'Register']);
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

//APIs and AJAX Calls
Route::get('/getCities/{id}', [CountryController::class,'getCities']);

//Resources - perform the same sets of actions against each resource in your application.Because of this common use case, Laravel resource routing assigns the typical create, read, update, and delete ("CRUD") routes to a controller with a single line of code.
Route::resources([
    'organisation' => OrganisationController::class,
    'branch' => BranchController::class,
    'employee' => EmployeeController::class,
]);

//Tests:
/*Route::view('/timeoff','tracker.timeoff');*/
Route::view('/timeoff','timeoff.timeoff');
Route::get('/session/get', [SessionController::class,'getSessionData'])->name('session.get');
Route::get('/session/set', [SessionController::class,'storeSessionData'])->name('session.store');
Route::get('/session/remove', [SessionController::class,'deleteSessionData'])->name('session.delete');
Route::get('tests', [UserController::class,'profile'])->name('profile');
Route::get('/org', [Employer_Dashboard::class,'index'])->name('profile');
Route::get('/citytest', [CountryController::class,'index']);


//DB Tests
Route::get('/dbtest', [CountryController::class,'getCountry']);
Route::get('/test', function () {
    return view('test');
});

Route::view('/employee_test','employee.index');
Route::view('/employee_test2','employee.create');
Route::view('/ui_test','top_nav');
