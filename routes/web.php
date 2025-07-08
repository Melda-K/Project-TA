<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalbkController;
use App\Http\Controllers\JadwaljiwaController;
use App\Http\Controllers\KarierController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PribasosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SpController;
use App\Http\Controllers\SpesialisController;
use App\Models\Pelanggaran;
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
    Route::get('/jadwaljiwa', [JadwaljiwaController::class, 'index'])->name('jadwaljiwa.index');
    Route::get('/jadwaljiwa/create', [JadwaljiwaController::class, 'create'])->name('jadwaljiwa.create');
    Route::post('/jadwaljiwa', [JadwaljiwaController::class, 'store'])->name('jadwaljiwa.store');
    Route::get('/jadwaljiwa/{id_jadwaljiwa}/edit', [JadwaljiwaController::class, 'edit'])->name('jadwaljiwa.edit');
    Route::match(['put', 'patch'], '/jadwaljiwa/{id_jadwaljiwa}', [JadwaljiwaController::class, 'update'])->name('jadwaljiwa.update');
    Route::delete('/jadwaljiwa/{id_jadwaljiwa}', [JadwaljiwaController::class, 'destroy'])->name('jadwaljiwa.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/pelanggaran', [PelanggaranController::class, 'index'])->name('pelanggaran.index');
    Route::get('/pelanggaran/create', [PelanggaranController::class, 'create'])->name('pelanggaran.create');
    Route::post('/pelanggaran', [PelanggaranController::class, 'store'])->name('pelanggaran.store');
    Route::get('/pelanggaran/{id_pelanggaran}/edit', [PelanggaranController::class, 'edit'])->name('pelanggaran.edit');
    Route::match(['put', 'patch'], '/pelanggaran/{id_pelanggaran}', [PelanggaranController::class, 'update'])->name('pelanggaran.update');
    Route::delete('/pelanggaran/{id_pelanggaran}', [PelanggaranController::class, 'destroy'])->name('pelanggaran.destroy');
    Route::get('/pelanggaran/{id_pelanggaran}/detail', [PelanggaranController::class, 'show'])->name('pelanggaran.detail');
});

Route::middleware('auth')->group(function () {
    Route::get('/pribasos', [PribasosController::class, 'index'])->name('pribasos.index');
    Route::get('/pribasos/create', [PribasosController::class, 'create'])->name('pribasos.create');
    Route::post('/pribasos', [PribasosController::class, 'store'])->name('pribasos.store');
    Route::get('/pribasos/{id_pribasos}/edit', [PribasosController::class, 'edit'])->name('pribasos.edit');
    Route::match(['put', 'patch'], '/pribasos/{id_pribasos}', [PribasosController::class, 'update'])->name('pribasos.update');
    Route::delete('/pribasos/{id_pribasos}', [PribasosController::class, 'destroy'])->name('pribasos.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/belajar', [BelajarController::class, 'index'])->name('belajar.index');
    Route::get('/belajar/create', [BelajarController::class, 'create'])->name('belajar.create');
    Route::post('/belajar', [BelajarController::class, 'store'])->name('belajar.store');
    Route::get('/belajar/{id_belajar}/edit', [BelajarController::class, 'edit'])->name('belajar.edit');
    Route::match(['put', 'patch'], '/belajar/{id_belajar}', [BelajarController::class, 'update'])->name('belajar.update');
    Route::delete('/belajar/{id_belajar}', [BelajarController::class, 'destroy'])->name('belajar.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/karier', [KarierController::class, 'index'])->name('karier.index');
    Route::get('/karier/create', [KarierController::class, 'create'])->name('karier.create');
    Route::post('/karier', [KarierController::class, 'store'])->name('karier.store');
    Route::get('/karier/{id_karier}/edit', [KarierController::class, 'edit'])->name('karier.edit');
    Route::match(['put', 'patch'], '/karier/{id_karier}', [KarierController::class, 'update'])->name('karier.update');
    Route::delete('/karier/{id_karier}', [KarierController::class, 'destroy'])->name('karier.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/sp', [SpController::class, 'index'])->name('sp.index');
    Route::get('/sp/create', [SpController::class, 'create'])->name('sp.create');
    Route::post('/sp', [SpController::class, 'store'])->name('sp.store');
    Route::get('/sp/{id_sp}/edit', [SpController::class, 'edit'])->name('sp.edit');
    Route::match(['put', 'patch'], '/sp/{id_sp}', [SpController::class, 'update'])->name('sp.update');
    Route::delete('/sp/{id_sp}', [SpController::class, 'destroy'])->name('sp.destroy');
});


require __DIR__ . '/auth.php';
