<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CashflowController,
    DashboardController,
    MitraController,
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
Route::resource('withdraw-requests', App\Http\Controllers\WithdrawRequestController::class)->middleware('auth');
Route::resource('banks', App\Http\Controllers\BankController::class)->middleware('auth');
Route::resource('paylater-providers', App\Http\Controllers\PaylaterProviderController::class)->middleware('auth');
Route::resource('paylaters', App\Http\Controllers\PaylaterController::class)->middleware('auth');
Route::get('paylaters/bayar/{id}', [PaylaterController::class, 'bayar'])->name('paylaters.bayar');
Route::post('paylaters/bayar', [PaylaterController::class, 'bayarAngsuran'])->name('paylaters.bayar.bayarAngsuran');
Route::resource('cashflow-transactions', App\Http\Controllers\CashflowTransactionController::class)->middleware('auth');
Route::resource('terms', App\Http\Controllers\TermController::class)->middleware('auth');
Route::resource('ppob-accounts', App\Http\Controllers\PpobAccountController::class)->middleware('auth');

Route::post('/import', [CashflowController::class, 'import'])->name('cashflows.import');
Route::get('/export', [MitraController::class, 'export'])->name('mitra.export');

Route::get('mitra', [App\Http\Controllers\MitraController::class, 'index'])->name('mitra.index')->middleware('auth');
Route::get('mitra/{id}', [App\Http\Controllers\MitraController::class, 'show'])->name('mitra.show')->middleware('auth');

// PPOB
Route::get('pulsa/akun', [App\Http\Controllers\AkunPulsaController::class, 'akun'])->name('pulsa.akun')->middleware('auth');
Route::get('pulsa/kategori', [App\Http\Controllers\PrabayarCategoryController::class, 'index'])->name('pulsa.kategori')->middleware('auth');
Route::post('pulsa/kategori', [App\Http\Controllers\PrabayarCategoryController::class, 'store'])->name('pulsa.kategori.store')->middleware('auth');
Route::get('pulsa/operator', [App\Http\Controllers\PrabayarOpratorController::class, 'getProductId'])->name('pulsa.operator.index')->middleware('auth');

Route::get('log-activity', [App\Http\Controllers\LogAcivityController::class, 'index'])->name('activities.index')->middleware('auth');
Route::get('neraca', [App\Http\Controllers\NeracaController::class, 'index'])->name('neraca.index')->middleware('auth');
Route::get('testing', [App\Http\Controllers\TestController::class, 'index'])->name('testing.index')->middleware('auth');
