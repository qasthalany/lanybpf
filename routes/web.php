<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});


Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/mahasiswa/{param1}' , [MahasiswaController::class,'show']);

Route::get('/about', function () {
    return view('halaman-about');
});

use App\Http\Controllers\MataKuliahController;

Route::get('/matakuliah/{param1}', [MataKuliahController::class, 'show'])
    ->name('matakuliah.show');


Route ::get('/home', [HomeController::class, 'index']);
