<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ClientAccountCreation;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\NewAccountController;
use App\Http\Controllers\NSBController;
use App\Http\Controllers\OtherBankController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\RequestCardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WireTransferController;
use App\Http\Controllers\WithdrawalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the application bootstrap within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/', 'pages.index')->name('index');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/loan', 'pages.loan')->name('loan');
Route::view('/investment', 'pages.investment')->name('investment');
Route::view('/portfoliomgt', 'pages.portfoliomgt')->name('portfoliomgt');
Route::view('/forex', 'pages.forex')->name('forex');
Route::view('/personal/checking', 'pages.personal.checking')->name('personal.checking');
Route::view('/personal/savings', 'pages.personal.savings')->name('personal.savings');
Route::view('/personal/ira', 'pages.personal.ira')->name('personal.ira');
Route::view('/business/checking', 'pages.business.checking')->name('business.checking');
Route::view('/business/savings', 'pages.business.savings')->name('business.savings');
Route::view('/business/ira', 'pages.business.ira')->name('business.ira');
Route::view('/wealthmgt/trust-service', 'pages.wealth.trust-service')->name('trust-service');
Route::view('/wealthmgt/estate-planning', 'pages.wealth.estate-planning')->name('estate-planning');
Route::view('/wealthmgt/financial-planning', 'pages.wealth.financial-planning')->name('financial-planning');


Route::get('signup/personal-info', [NewAccountController::class, 'personalInfo'])->name('personalInfo');
Route::post('signup/personal-info', [NewAccountController::class, 'storeAccountInfo'])->name('storeAccountInfo');
Route::get('account/setup/xd{id}3et64', [NewAccountController::class, 'accountSetup'])->name('accountSetup');
Route::post('account/setup/', [NewAccountController::class, 'storeAccountSetup'])->name('storeAccountSetup');
Route::get('account/terms-and-conditions/xd{id}3et64', [NewAccountController::class, 'terms'])->name('terms');
Route::get('account/review/xd{id}3et64', [NewAccountController::class, 'accountReview'])->name('accountReview');
Route::get('submit/details/xd{id}3et64', [NewAccountController::class, 'submitDetails'])->name('submitDetails');

//Route::view('/','pages.index')->name('index');
Route::view('/contact-us','pages.contact-us')->name('contact');
Route::view('bank-accounts','pages.bank-accounts')->name('bank_accounts');
Route::view('register/new-account','pages.new-account')->name('reg_new_account');

Route::post('new-account', [ClientAccountCreation::class, 'new_account'])->name('new_account');

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'active'], 'prefix' => 'user', 'as' => 'user.'], function () {

    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('support', [UserController::class, 'support'])->name('support');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::get('edit/profile/{id}', [UserController::class, 'editProfile'])->name('editProfile');
    Route::get('password', [UserController::class, 'password'])->name('password');
    Route::post('change-password', [UserController::class, 'storePassword'])->name('storePassword');


    // Withdrawal Routes
    Route::get('statement', [WithdrawalController::class, 'withdrawHistory'])->name('statement');
//    Route::get('process', 'TransactionsController@process')->name('process');

//    NSB Transfer
    Route::get('nsb/transfer', [NSBController::class, 'nsbTransfer'])->name('acuTransfer');
    Route::post('store/nsb/transfer', [NSBController::class, 'storeNsbTransfer'])->name('storeNsbTransfer');
    Route::get('process/nsb/{id}', [NSBController::class, 'processNsb'])->name('processNsb');
    Route::get('nsb/code/{id}', [NSBController::class, 'nsb_code'])->name('nsb_code');
    Route::post('store/nsb-code', [NSBController::class, 'nsb_store'])->name('nsb_store');
    Route::get('process/{id}/nsb/final', [NSBController::class, 'processFinal'])->name('processFinal');
    Route::get('transaction/nsb-details/{id}', [NSBController::class, 'withdrawal_details'])->name('nsb_withdrawal_details');

//    Other Bank Transfer
    Route::get('obank/transfer', [OtherBankController::class, 'obankTransfer'])->name('otherBankTransfer');
    Route::post('store/obank/transfer', [OtherBankController::class, 'storeObankTransfer'])->name('storeObankTransfer');
    Route::get('process/obank/{id}', [OtherBankController::class, 'processObank'])->name('processObank');
    Route::get('obank/code/{id}', [OtherBankController::class, 'obank_code'])->name('obank_code');
    Route::post('store/obank', [OtherBankController::class, 'obank_store'])->name('obank_store');
    Route::get('process/obank/otp/{id}', [OtherBankController::class, 'processOtp'])->name('processObankOtp');
    Route::get('obank/otp/code/{id}', [OtherBankController::class, 'otp_code'])->name('otp_code');
    Route::post('store/obank/otp', [OtherBankController::class, 'otp_store'])->name('otp_store');
    Route::get('process/obank-details/{id}', [OtherBankController::class, 'processObankDetails'])->name('processObankDetails');
    Route::get('transaction/obank-details/{id}', [OtherBankController::class, 'withdrawal_details'])->name('obank_withdrawal_details');

//    Wire Transfer
    Route::get('wire-transfer', [WireTransferController::class, 'wireTransfer'])->name('wire_transfer');
    Route::post('wire-transfer', [WireTransferController::class, 'storeWireTransfer'])->name('storeWireTransfer');
    Route::get('process/wire-transfer/{id}', [WireTransferController::class, 'processWireTransfer'])->name('processWireTransfer');
    Route::get('wire-transfer/nsb/{id}', [WireTransferController::class, 'WireNsbCode'])->name('WireNsbCode');
    Route::post('wire-transfer/nsb', [WireTransferController::class, 'wireNsbStore'])->name('wireNsbStore');
    Route::get('process/wire-transfer/nsb/{id}', [WireTransferController::class, 'processWireNsb'])->name('processWireNsb');
    Route::get('wire-transfer/otp/{id}', [WireTransferController::class, 'wireOptCode'])->name('wireOptCode');
    Route::post('wire-transfer/otp/', [WireTransferController::class, 'wireOtpStore'])->name('wireOtpStore');
    Route::get('process/wire-transfer/otp/{id}', [WireTransferController::class, 'processWireOtp'])->name('processWireOtp');
    Route::get('wire-transfer/atc/{id}', [WireTransferController::class, 'wireAtcCode'])->name('wireAtcCode');
    Route::post('wire-transfer/atc/', [WireTransferController::class, 'wireAtcStore'])->name('wireAtcStore');
    Route::get('process/wire-transfer/atc/{id}', [WireTransferController::class, 'processWireAtc'])->name('processWireAtc');
    Route::get('wire-transfer/details/{id}', [WireTransferController::class, 'withdrawal_details'])->name('wire_withdrawal_details');

    Route::get('transfer/history', [WithdrawalController::class, 'withdrawHistory'])->name('withdrawHistory');

    // Deposits Payment Route
    Route::get('/deposit/methods', [PaymentMethodController::class, 'payment_method'])->name('payment_method');
    Route::get('/deposit/method/details/{id}', [PaymentMethodController::class, 'PaymentMethodDetails'])->name('PaymentMethodDetails');
    Route::post('store/deposit', [PaymentMethodController::class, 'storeDeposit'])->name('storeDeposit');
    Route::get('deposit/payment/{id}', [PaymentMethodController::class, 'payment'])->name('payment');
    Route::get('bitcoin/deposit', [PaymentMethodController::class, 'bitcoin'])->name('bitcoin');

    //Deposits Route
    Route::get('deposits', [DepositController::class, 'deposits'])->name('deposits');

//    Loan Route
    Route::resource('loan', LoanController::class);

    // Card Route
    Route::resource('card', RequestCardController::class);


});
Route::get('get-started', [UserController::class, 'pending'])->name('pending');

include'admin.php';