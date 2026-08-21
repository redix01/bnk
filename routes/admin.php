<?php

use App\Http\Controllers\Admin\AdminCardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDeposits;
use App\Http\Controllers\Admin\AdminLoans;
use App\Http\Controllers\Admin\AdminPaymentMethod;
use App\Http\Controllers\Admin\AdminSettings;
use App\Http\Controllers\Admin\AdminTransactions;
use App\Http\Controllers\Admin\AdminWithdrawal;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('add/admin', [AdminController::class, 'create'])->name('add_admin');
    Route::post('add/admin', [AdminController::class, 'store_admin'])->name('store_admin');
    Route::get('edit/admin/{id}', [AdminController::class, 'edit_admin'])->name('edit_admin');
    Route::patch('edit/admin/{id}', [AdminController::class, 'update_admin'])->name('update_admin');

    // User Route
    Route::get('users', [UserController::class, 'all_users'])->name('users');
    Route::get('active/users', [UserController::class, 'active_users'])->name('active_users');
    Route::get('inactive/users', [UserController::class, 'inactive_users'])->name('inactive_users');
    Route::get('admins', [UserController::class, 'admins'])->name('admins');
    Route::get('user-details/{id}', [UserController::class, 'user_details'])->name('user_details');
    Route::get('edit/user/{id}', [UserController::class, 'edit_details'])->name('edit_details');
    Route::patch('update/user/{id}', [UserController::class, 'update_user'])->name('update_user');
    Route::get('add-user', [UserController::class, 'create'])->name('add_user');
    Route::post('store/user', [UserController::class, 'store_user'])->name('store_user');
    Route::delete('user/{id}/delete', [UserController::class, 'delete_user'])->name('delete.user');
    Route::get('approve/user/{id}', [UserController::class, 'approveUser'])->name('approveUser');
    Route::get('suspend/user/{id}', [UserController::class, 'suspend_user'])->name('suspendUser');
    Route::post('debit/user', [UserController::class, 'DebitUser'])->name('DebitUser');
    //  End of User Route


    //  Transfer Route
    Route::get('nsb-transfer', [AdminTransactions::class, 'nsbTransfer'])->name('nsbTransfer');
    Route::get('nsb-transfer/details/{id}', [AdminTransactions::class, 'nsbTransferDetails'])->name('nsbTransferDetails');
    Route::post('send/nsb-code/{id}', [AdminTransactions::class, 'admin_nsb'])->name('admin_nsb');
    Route::post('send/otp-code/{id}', [AdminTransactions::class, 'admin_otp'])->name('admin_otp');
    Route::post('send/atc-code/{id}', [AdminTransactions::class, 'admin_atc'])->name('admin_atc');
    Route::get('obank-transfer', [AdminTransactions::class, 'obankTransfer'])->name('obankTransfer');
    Route::get('obank-transfer/details/{id}', [AdminTransactions::class, 'obankTransferDetails'])->name('obankTransferDetails');
    Route::get('wire-transfer', [AdminTransactions::class, 'wireTransfer'])->name('wireTransfer');
    Route::get('wire-transfer/details/{id}', [AdminTransactions::class, 'wireTransferDetails'])->name('wireTransferDetails');

    //  Deposits Route
    Route::get('add/deposit', [AdminDeposits::class, 'add_deposit'])->name('add_deposit');
    Route::get('deposit', [AdminDeposits::class, 'deposits'])->name('deposits');
    Route::post('store/deposit', [AdminDeposits::class, 'storeDeposit'])->name('storeDeposit');
    Route::delete('delete/deposit/{id}', [AdminDeposits::class, 'deleteDeposit'])->name('deleteDeposit');

    // Loan Routes
    Route::get('active/loans', [AdminLoans::class, 'activeLoans'])->name('activeLoans');
    Route::get('pending/loans', [AdminLoans::class, 'pendingLoan'])->name('pendingLoan');
    Route::get('approve/loan/{id}', [AdminLoans::class, 'approveLoan'])->name('approveLoan');
    Route::get('eligable/user/loans', [AdminLoans::class, 'eligable'])->name('eligable');
    Route::get('activate/user/loans/{id}', [AdminLoans::class, 'activateEligable'])->name('activateEligable');
    Route::get('decline/user/loans', [AdminLoans::class, 'decline'])->name('decline');
    Route::delete('delete/loans', [AdminLoans::class, 'deleteLoan'])->name('deleteLoan');

    // Payment Method Routes
    Route::get('payment/methods', [AdminPaymentMethod::class, 'payment_method'])->name('payment_method');
    Route::get('add/payment/methods', [AdminPaymentMethod::class, 'addMethod'])->name('addMethod');
    Route::post('add/bank/methods', [AdminPaymentMethod::class, 'storeBankMethod'])->name('storeBankMethod');
    Route::get('add/bitcoin/methods', [AdminPaymentMethod::class, 'bitcoinMethod'])->name('bitcoinMethod');
    Route::post('store/bitcoin/methods', [AdminPaymentMethod::class, 'storeBtcMethod'])->name('storeBtcMethod');
    Route::get('add/instant/transfer', [AdminPaymentMethod::class, 'instantTransfer'])->name('instantTransfer');
    Route::post('store/instant/transfer', [AdminPaymentMethod::class, 'storeInstantTransfer'])->name('storeInstantTransfer');
    Route::delete('delete/payment/method/{id}', [AdminPaymentMethod::class, 'deleteMethod'])->name('deleteMethod');

//    Message route
    Route::get('user/profile/message/{id}', [MessageController::class, 'index'])->name('user_message')->where('id', '[0-9]+');
    Route::get('user/message/create/{id}', [MessageController::class, 'create'])->name('create');
    Route::post('user/message/store', [MessageController::class, 'store'])->name('mesg_store');
    Route::get('user/message/details/{id}', [MessageController::class, 'show'])->name('msg_show');

    Route::get('user/verify{id}', [AdminController::class, 'approve_user'])->name('verify_user');

    Route::get('withdrawal/{id}', [AdminWithdrawal::class, 'withdrawal_details'])->name('withdrawal_details');

    Route::get('settings', [AdminSettings::class, 'settings'])->name('settings');
    Route::post('update/admin-profile', [AdminSettings::class, 'admin_info_store'])->name('admin_info_store');

    Route::post('update/admin-password', [AdminSettings::class, 'change_password'])->name('change_password');

//    Cards Route
    Route::get('cards', [AdminCardController::class, 'cards'])->name('cards');
    Route::get('approve/card/{id}', [AdminCardController::class, 'approveCard'])->name('approveCard');
    Route::delete('delete/card/{id}', [AdminCardController::class, 'deleteCard'])->name('deleteCard');

    //  Password Route
    Route::get('security', [AdminController::class, 'password'])->name('password');
    Route::post('password/store', [AdminController::class, 'storePassword'])->name('storePassword');

});