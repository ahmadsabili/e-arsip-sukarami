<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::resource('users', UserController::class);
Route::resource('dokumen', DokumenController::class)->middleware('auth');
Route::get('dokumen/{id}/download', [DokumenController::class, 'download'])->name('dokumen.download');

Route::get('/triwulan', [DokumenController::class, 'getTriwulan'])->name('triwulan');
Route::get('umkm', [DokumenController::class, 'getUmkm'])->name('umkm');
Route::get('/bansos', [DokumenController::class, 'getBansos'])->name('bansos');
Route::get('/masjid', [DokumenController::class, 'getMasjid'])->name('masjid');
Route::get('/monography', [DokumenController::class, 'getMonography'])->name('monography');
Route::get('/kelurahan-cantik', [DokumenController::class, 'getKelurahanCantik'])->name('kelurahan-cantik');
Route::get('/pkk', [DokumenController::class, 'getPkk'])->name('pkk');
Route::get('/pbb', [DokumenController::class, 'getPbb'])->name('pbb');

Route::resource('profil', ProfilController::class)->middleware(['auth']);
Route::get('/change-password', [ProfilController::class, 'changePassword'])->name('change-password');
Route::put('/change-password', [ProfilController::class, 'updatePassword'])->name('update-password');