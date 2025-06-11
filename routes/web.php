<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalbkController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SpesialisController;
use App\Models\Spesialis;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id_guru}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::match(['put', 'patch'], '/guru/{id_guru}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id_guru}', [GuruController::class, 'destroy'])->name('guru.destroy');
});

Route::middleware('auth')->group(function () {
    route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id_siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::match(['put', 'patch'], '/siswa/{id_siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id_siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::get('/filter', [SiswaController::class, 'filter'])->name('siswa.filter');
    Route::get('/siswa/{nis}', [SiswaController::class, 'show']);
    Route::get('/searchSiswa', [SiswaController::class, 'searchSiswa'])->name('searchSiswa');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/spesialis', [SpesialisController::class, 'index'])->name('spesialis.index');
    Route::get('/spesialis/create', [SpesialisController::class, 'create'])->name('spesialis.create');
    Route::post('/spesialis', [SpesialisController::class, 'store'])->name('spesialis.store');
    Route::get('/spesialis/{id_spesialis_kejiwaan}/edit', [SpesialisController::class, 'edit'])->name('spesialis.edit');
    Route::match(['put', 'patch'], '/spesialis/{id_spesialis_kejiwaan}', [SpesialisController::class, 'update'])->name('spesialis.update');
    Route::delete('/spesialis/{id_spesialis_kejiwaan}', [SpesialisController::class, 'destroy'])->name('spesialis.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/jadwalbk', [JadwalbkController::class, 'index'])->name('jadwalbk.index');
    Route::get('/jadwalbk/create', [JadwalbkController::class, 'create'])->name('jadwalbk.create');
    Route::post('/jadwalbk', [JadwalbkController::class, 'store'])->name('jadwalbk.store');
    Route::get('/jadwalbk/{id_jadwal}/edit', [JadwalbkController::class, 'edit'])->name('jadwalbk.edit');
    Route::match(['put', 'patch'], '/jadwalbk/{id_jadwal}', [JadwalbkController::class, 'update'])->name('jadwalbk.update');
    Route::delete('/jadwalbk/{id_jadwal}', [JadwalbkController::class, 'destroy'])->name('jadwalbk.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/pelanggaran', [PelanggaranController::class, 'index'])->name('pelanggaran.index');
});


require __DIR__.'/auth.php';
