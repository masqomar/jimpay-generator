<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    UserController,
    ProfileController,
    RoleAndPermissionController,
    PaylaterController,
    PermissionController
};

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/profile', ProfileController::class)->name('profile');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleAndPermissionController::class);
    Route::resource('permissions', PermissionController::class);
});


require_once __DIR__ . '/anggota.php';

Route::resource('pembagian-shu', App\Http\Controllers\ShuController::class)->middleware('auth');
Route::resource('devidens', App\Http\Controllers\DevidenController::class)->middleware('auth');
Route::resource('periods', App\Http\Controllers\PeriodController::class)->middleware('auth');
Route::resource('user-topups', App\Http\Controllers\UserTopupController::class)->middleware('auth');
Route::resource('saving-account-types', App\Http\Controllers\SavingAccountTypeController::class)->middleware('auth');
Route::resource('saving-accounts', App\Http\Controllers\SavingAccountController::class)->middleware('auth');
Route::resource('cashflows', App\Http\Controllers\CashflowController::class)->middleware('auth');
Route::resource('kop-product-types', App\Http\Controllers\KopProductTypeController::class)->middleware('auth');
Route::resource('user-savings', App\Http\Controllers\UserSavingController::class)->middleware('auth');
Route::resource('kop-products', App\Http\Controllers\KopProductController::class)->middleware('auth');
Route::resource('user-saving-transactions', App\Http\Controllers\UserSavingTransactionController::class)->middleware('auth');

Route::resource('banks', App\Http\Controllers\BankController::class)->middleware('auth');
Route::resource('paylater-providers', App\Http\Controllers\PaylaterProviderController::class)->middleware('auth');
Route::resource('paylaters', App\Http\Controllers\PaylaterController::class)->middleware('auth');
Route::get('paylaters/bayar/{id}', [PaylaterController::class, 'bayar'])->name('paylaters.bayar');
Route::post('paylaters/bayar', [PaylaterController::class, 'bayarAngsuran'])->name('paylaters.bayar.bayarAngsuran');
Route::resource('cashflow-transactions', App\Http\Controllers\CashflowTransactionController::class)->middleware('auth');

Route::resource('terms', App\Http\Controllers\TermController::class)->middleware('auth');