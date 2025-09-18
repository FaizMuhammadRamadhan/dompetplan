<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DompetController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TanggunganController;
use App\Http\Controllers\MasterDompetController;
use App\Http\Controllers\MasterTargetController;
use App\Http\Controllers\TabunganTargetController;
use App\Http\Controllers\MasterTanggunganController;


Route::prefix('pengguna')->name('pengguna.')->group(function () {
    Route::get('/', [PenggunaController::class, 'index'])->name('index');
    Route::get('/create', [PenggunaController::class, 'create'])->name('create');
    Route::post('/', [PenggunaController::class, 'store'])->name('store');
    Route::get('/{pengguna}', [PenggunaController::class, 'show'])->name('show');
    Route::get('/{pengguna}/edit', [PenggunaController::class, 'edit'])->name('edit');
    Route::put('/{pengguna}', [PenggunaController::class, 'update'])->name('update');
    Route::delete('/{id}', [PenggunaController::class, 'destroy'])->name('destroy');

});

Route::prefix('master-dompet')->name('master-dompet.')->group(function () {
    Route::get('/', [MasterDompetController::class, 'index'])->name('index');
    Route::post('/store', [MasterDompetController::class, 'store'])->name('store');
    Route::put('/{master_dompet}', [MasterDompetController::class, 'update'])->name('update');
    Route::delete('/{master_dompet}', [MasterDompetController::class, 'destroy'])->name('destroy');
});

Route::prefix('master-tanggungan')->name('master-tanggungan.')->group(function () {
    Route::get('/', [MasterTanggunganController::class, 'index'])->name('index');
    Route::post('/store', [MasterTanggunganController::class, 'store'])->name('store');
    Route::put('/{master_tanggungan}', [MasterTanggunganController::class, 'update'])->name('update');
    Route::delete('/{master_tanggungan}', [MasterTanggunganController::class, 'destroy'])->name('destroy');
});

Route::prefix('master-target')->name('master-target.')->group(function () {
    Route::get('/', [MasterTargetController::class, 'index'])->name('index');
    Route::post('/store', [MasterTargetController::class, 'store'])->name('store');
    Route::put('/{master_target}', [MasterTargetController::class, 'update'])->name('update');
    Route::delete('/{master_target}', [MasterTargetController::class, 'destroy'])->name('destroy');
});