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
use App\Http\Controllers\ShiftTypeController;
use App\Http\Controllers\FullShiftsController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\OpenShiftsController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\BreakController;
use App\Http\Controllers\OptimisationController;
use App\Http\Controllers\PaySlipController;
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

    Route::get('/dashboard/account/breaks',[BreakController::class, 'index']);
    Route::post('/breaks',[BreakController::class, 'storeBreakType']);

    Route::get('/dashboard/account/shift_designations',[ShiftTypeController::class, 'index']);
    Route::post('/shift_designations',[ShiftTypeController::class, 'store']);

//Full Shifts
    Route::post('full-shifts-filter',[FullShiftsController::class, 'filter_shift'])->name('full-shifts-filter');
    Route::get('/full_shifts/approve/{id}',[FullShiftsController::class, 'approve']);
    Route::get('/full_shifts/unapprove/{id}',[FullShiftsController::class, 'unapprove']);
    Route::delete('/full_shifts/delete-selected-shifts',[FullShiftsController::class, 'destroyCheckedShifts'])->name('full_shifts.deleteSelected');
    Route::put('/full_shifts/approve-selected-shifts',[FullShiftsController::class, 'approveCheckedShifts'])->name('full_shifts.approveSelected');
    Route::put('/full_shifts/unapprove-selected-shifts',[FullShiftsController::class, 'unapproveCheckedShifts'])->name('full_shifts.unapproveSelected');
    Route::post('/full_shifts/shifts-break',[BreakController::class, 'addShiftBreak'])->name('full_shifts.addShiftBreak');
    Route::put('/full_shifts/end-shifts-earley',[BreakController::class, 'endShiftsEarley'])->name('full_shifts.endShiftsEarley');
    Route::put('/full_shifts/qrclockin',[FullShiftsController::class, 'qrClockIn'])->name('full_shifts.qrclockin');
//Pay Slip
    Route::get('/pay_slip/',[PaySlipController::class, 'index']);
    Route::post('/pay_slip_generate/',[PaySlipController::class, 'generatePaySlip'])->name('generate_pay_slip');
//Automatic Shifts
    Route::get('/automatic_shifts/',[FullShiftsController::class, 'automaticShiftsIndex']);
    Route::post('/full_shifts/approve-selected-shifts',[FullShiftsController::class, 'pushGeneratedShifts'])->name('full_shifts.pushGeneratedShifts');

//Open Shifts
    Route::post('/open_shifts_filter',[OpenShiftsController::class, 'index']);
    Route::get('/open_shifts/approve/{id}',[OpenShiftsController::class, 'approve']);
    Route::get('/open_shifts/unapprove/{id}',[OpenShiftsController::class, 'unapprove']);
    Route::get('/open_shifts/endshift/{id}',[OpenShiftsController::class, 'end']);
    Route::delete('/open_shifts/delete-selected-shifts',[OpenShiftsController::class, 'destroyCheckedShifts'])->name('open_shifts.deleteSelected');
    Route::put('/open_shifts/approve-selected-shifts',[OpenShiftsController::class, 'approveCheckedShifts'])->name('open_shifts.approveSelected');
    Route::put('/open_shifts/unapprove-selected-shifts',[OpenShiftsController::class, 'unapproveCheckedShifts'])->name('open_shifts.unapproveSelected');
    Route::put('/open_shifts/end-selected-shifts',[OpenShiftsController::class, 'endCheckedShifts'])->name('open_shifts.endSelected');

//Holiday
    Route::get('/dashboard/account/expense_type',[ExpenseController::class, 'expense_type_index']);
    Route::post('/expense_type',[ExpenseController::class, 'storeType'])->name('holiday_type');
    Route::post('/expense_filter',[ExpenseController::class, 'index']);
    Route::get('/expense/approve/{id}',[ExpenseController::class, 'approve']);
    Route::get('/expense/unapprove/{id}',[ExpenseController::class, 'unapprove']);
    Route::delete('/expense/delete-selected-shifts',[ExpenseController::class, 'destroyCheckedShifts'])->name('holiday.deleteSelected');
    Route::put('/expense/approve-selected-shifts',[ExpenseController::class, 'approveCheckedShifts'])->name('holiday.approveSelected');
    Route::put('/expense/unapprove-selected-shifts',[ExpenseController::class, 'unapproveCheckedShifts'])->name('holiday.unapproveSelected');

//Expense
    Route::get('/dashboard/account/holiday_type',[HolidayController::class, 'holiday_type_index']);
    Route::post('/holiday_type',[HolidayController::class, 'storeType'])->name('holiday_type');
    Route::post('/holiday_filter',[HolidayController::class, 'index']);
    Route::get('/holiday/approve/{id}',[HolidayController::class, 'approve']);
    Route::get('/holiday/unapprove/{id}',[HolidayController::class, 'unapprove']);
    Route::delete('/holiday/delete-selected-shifts',[HolidayController::class, 'destroyCheckedShifts'])->name('holiday.deleteSelected');
    Route::put('/holiday/approve-selected-shifts',[HolidayController::class, 'approveCheckedShifts'])->name('holiday.approveSelected');
    Route::put('/holiday/unapprove-selected-shifts',[HolidayController::class, 'unapproveCheckedShifts'])->name('holiday.unapproveSelected');


    Route::get('/dashboard/account/branch_shift_designations',[ShiftTypeController::class, 'branch_index']);
    Route::post('/branch_shift_designations',[ShiftTypeController::class, 'store']);



    Route::get('/profile', [UserController::class,'profile'])->name('profile');
    Route::get('/edit-profile', [UserController::class,'showEditProfile'])->name('edit-profile');
    Route::post('/edit-profile', [UserController::class,'edit']);

    Route::get('/dashboard/full_shifts', [OFullShiftsController::class,'index']);

    //QR Codes
    Route::get('/qr/{id}', [QrCodeController::class,'fullshift_store']);
    Route::get('/qr_full_shifts/{id}', [QrCodeController::class,'displayShifts']);
    Route::get('/open_qr/{id}', [QrCodeController::class,'getCities']);

    //Optimisation
    Route::get('/optimisation', [OptimisationController::class,'index']);

//Resources - perform the same sets of actions against each resource in your application.Because of this common use case, Laravel resource routing assigns the typical create, read, update, and delete ("CRUD") routes to a controller with a single line of code.
    Route::resources([
        'organisation' => OrganisationController::class,
        'branch' => BranchController::class,
        'employee' => EmployeeController::class,
        'full_shifts' => FullShiftsController::class,
        'open_shifts' => OpenShiftsController::class,
        'holiday' => HolidayController::class,
        'expense' => ExpenseController::class,
    ]);
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
