<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InventoryManagementController;
use App\Http\Controllers\Admin\MedicineClassificationController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\ReceivingManagementController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\StockManagementController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login.index');
});

//Route to login
Route::post('/login', [AuthController::class, 'login'])->middleware(['guest'])->name('login');
Route::get('/login', function () {
    return view('auth.login');
})->middleware(['guest'])->name('login.index');
Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth'])->name('logout');


//Route to signup 
Route::get('/register', [RegistrationController::class, 'index'])->middleware(['guest'])->name('register.index');
Route::post('/create-account', [RegistrationController::class, 'store'])->middleware(['guest'])->name('register.store');
Route::get('/register-verify-otp/{email}', [RegistrationController::class, 'verifyOtpIndex'])->middleware(['guest'])->name('register.verify.otp');
Route::post('/verify-register-otp', [RegistrationController::class, 'verifyOtp'])->middleware(['guest'])->name('register.verifyOtp');
Route::get('/resend-opt/{email}', [RegistrationController::class, 'resendOtp'])->middleware(['guest'])->name('register.resendOtp');


//Reset Password Urls
Route::post('/forgot-password', [PasswordResetController::class, 'sendOtp'])->middleware(['guest'])->name('sendOtp');
Route::post('/verify-otp', [PasswordResetController::class, 'verifyOtp'])->middleware(['guest'])->name('verifyOtp');
Route::get('/password-reset-verify', [PasswordResetController::class, 'verifyOtpIndex'])->middleware(['guest'])->name('password.reset.verify');
Route::post('/resetPassword', [PasswordResetController::class, 'resetPassword'])->middleware(['guest'])->name('resetPassword');
Route::get('/resetPassword', [PasswordResetController::class, 'index'])->middleware(['guest'])->name('resetPassword.index');


//Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');



//Route Save Image
// Route::match(['POST', 'PUT'], '/save_image/{id?}', [ApplicantController::class, 'save_image'])->name('save_image');
//Route Voucher Upload 
// Route::match(['POST', 'PUT'], '/save_voucher/{id?}', [ApplicantController::class, 'applyExam'])->name('applyExam');


Route::resource('/dashboard/medicine-classification', MedicineClassificationController::class)->middleware(['auth']);
Route::resource('/dashboard/user', UserController::class)->middleware(['auth']);
Route::resource('/dashboard/supplier', SupplierController::class)->middleware(['auth']);
Route::resource('/dashboard/medicine', MedicineController::class)->middleware(['auth']);
Route::resource('/dashboard/stock', StockManagementController::class)->middleware(['auth']);
Route::resource('/dashboard/receiving', ReceivingManagementController::class)->middleware(['auth']);
Route::resource('/dashboard/stock', StockManagementController::class)->middleware(['auth']);
Route::resource('/dashboard/inventory', InventoryManagementController::class)->middleware(['auth'])->only('index');
Route::resource('/dashboard/customer', CustomerController::class)->middleware(['auth']);
Route::resource('/dashboard/sales', SalesController::class)->middleware(['auth']);
Route::put('/dashboard/sales/quantity/update/{id}', [SalesController::class, 'updateQuantity'])->middleware(['auth']);
Route::get('/dashboard/sales/print/{id}', [SalesController::class, 'print'])->middleware(['auth'])->name('sales.print');
