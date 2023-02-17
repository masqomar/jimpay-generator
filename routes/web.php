<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    UserController,
    ProfileController,
    RoleAndPermissionController
};
use App\Models\User;

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/profile', ProfileController::class)->name('profile');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleAndPermissionController::class);
});

Route::middleware(['auth', 'permission:test view'])->get('/tests', function () {
    // dd('This is just a test and an example for permission and sidebar menu. You can remove this line on web.php, config/permission.php and config/generator.php');
    // $user = User::first();
    // $pengguna = $user->deposit(50000, ['description' => 'Hutang']);

    // dd('ok');
})->name('tests.index');

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
