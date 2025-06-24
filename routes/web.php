<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaskesPublicController;


Route::get('/', [FaskesPublicController::class, 'index'])->name('faskes.index');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/faskes/jenis/{jenisFaskes}', [FaskesPublicController::class, 'showByType'])->name('faskes.by_type');
    Route::get('/faskes/{faske}', [FaskesPublicController::class, 'show'])->name('faskes.show');
});


// File ini berisi semua rute untuk proses otentikasi (login, register, logout, dll.)
require __DIR__.'/auth.php';
