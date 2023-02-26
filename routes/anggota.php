<?php

use App\Http\Controllers\User\BayarController;
use App\Http\Controllers\User\PaylaterController;
use App\Http\Controllers\User\PembiayaanController;
use App\Http\Controllers\User\ProdukAllController;
use App\Http\Controllers\User\ProfilController;
use App\Http\Controllers\User\RiwayatTransaksiController;
use App\Http\Controllers\User\SimSukarelaController;
use App\Http\Controllers\User\SimWajibController;
use App\Http\Controllers\User\TabunganController;
use App\Http\Controllers\User\TopupController;
use App\Http\Controllers\User\TransferController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'web'])->group(function () {
    // Bayar
    Route::get('bayar', [BayarController::class, 'index'])->name('user.bayar.index');
    Route::get('bayar/cari', [BayarController::class, 'cari'])->name('user.bayar.cari');
    Route::post('bayar/store', [BayarController::class, 'store'])->name('user.bayar.store');
    Route::get('bayar/sukses', [BayarController::class, 'sukses'])->name('user.bayar.sukses');

    // Transfer Saldo ke anggota lain
    Route::get('transfer', [TransferController::class, 'index'])->name('user.transfer.index');
    Route::get('transfer/manual', [TransferController::class, 'manualTransfer'])->name('user.transfer.manual');
    Route::get('cari-anggota', [TransferController::class, 'fetch'])->name('user.transfer.fetch');
    Route::post('transfer/simpanManualTransfer', [TransferController::class, 'simpanManualTransfer'])->name('user.transfer.simpanManualTransfer');
    Route::get('transfer/scantransfer', [TransferController::class, 'scantransfer'])->name('user.transfer.scantransfer');
    Route::get('transfer/cari', [TransferController::class, 'cari'])->name('user.transfer.cari');
    Route::post('transfer/kirimSaldo', [TransferController::class, 'kirimSaldo'])->name('user.transfer.kirimSaldo');

    // Topup Saldo
    Route::get('topup', [TopupController::class, 'index'])->name('user.topup.index');
    Route::get('topup/cash', [TopUpController::class, 'topUpCash'])->name('user.topup.cash');
    Route::post('topup/store', [TopUpController::class, 'store'])->name('user.topup.store');
    Route::get('topup/konfirmasi', [TopUpController::class, 'konfirmasi'])->name('user.topup.konfirmasi');
    Route::get('topup/sukarela', [TopUpController::class, 'topUpSukarela'])->name('user.topup.sukarela');
    // Route::post('topup/storeSukarela', [TopUpController::class, 'storeSukarela'])->name('user.topup.storeSukarela');

    // Simpanan Wajib
    Route::get('simpanan-wajib', [SimWajibController::class, 'index'])->name('user.sim-wajib.index');

    // Simpanan Sukarela
    Route::get('simpanan-sukarela', [SimSukarelaController::class, 'index'])->name('user.sim-sukarela.index');
    Route::get('simpanan-sukarela/detail/{id}', [SimSukarelaController::class, 'show'])->name('user.sim-sukarela.show');
    Route::get('simpanan-sukarela/penarikan/{id}', [SimSukarelaController::class, 'detailPenarikan'])->name('user.sim-sukarela.detailPenarikan');
    Route::get('simpanan-sukarela/pencairan', [SimSukarelaController::class, 'tarik'])->name('user.sim-sukarela.tarik');
    Route::post('simpanan-sukarela/pencairan', [SimSukarelaController::class, 'tarikStore'])->name('user.sim-sukarela.tarikStore');

    // Riwayat Transaksi
    Route::get('riwayat-transaksi', [RiwayatTransaksiController::class, 'index'])->name('user.riwayat-transaksi.index');

    // Tabungan
    Route::get('tabungan', [TabunganController::class, 'index'])->name('user.tabungan.index');

    // Paylater
    Route::get('paylater', [PaylaterController::class, 'index'])->name('user.paylater.index');

    // Pembiayaan
    Route::get('pembiayaan', [PembiayaanController::class, 'index'])->name('user.pembiayaan.index');

    // All Menu atau produk
    Route::get('produk', [ProdukAllController::class, 'index'])->name('user.produk.index');

    // Profil
    Route::get('profil', [ProfilController::class, 'index'])->name('user.profil.index');
    Route::get('ganti-password', [ProfilController::class, 'changePassword'])->name('user.profil.password');
    Route::get('edit-profil', [ProfilController::class, 'editProfil'])->name('user.profil.detail');
});
