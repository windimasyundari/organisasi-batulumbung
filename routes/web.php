<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('pengurus/login');
});

// Route::get('/', function () {
//     return view('pengurus/dashboard');
// });

// Login
Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::post('/dashboard', 'App\Http\Controllers\LoginController@prosesLogin')->name('dashboard');
Route::get('/dashboard', 'App\Http\Controllers\LoginController@dashboardAnggota');

//Register
Route::get('/register', 'App\Http\Controllers\RegisterController@index');
Route::post('/register/store', 'App\Http\Controllers\RegisterController@store')->name('register');

// Anggota
Route::get('/anggota/anggota', 'App\Http\Controllers\AnggotaController@index');
Route::get('/pengurus/anggota/create-anggota', 'App\Http\Controllers\AnggotaController@create');
Route::get('/anggota/anggota/{anggota}', 'App\Http\Controllers\AnggotaController@show');
Route::post('/pengurus/anggota/create-anggota', 'App\Http\Controllers\AnggotaController@store');
Route::delete('/anggota/anggota/{anggota}', 'App\Http\Controllers\AnggotaController@destroy');
Route::get('/anggota/anggota/{anggota}/edit', 'App\Http\Controllers\AnggotaController@edit');
Route::patch('/anggota/anggota/{anggota}', 'App\Http\Controllers\AnggotaController@update');

// Pengurus
Route::get('/pengurus/pengurus', 'App\Http\Controllers\PengurusController@index');
Route::get('/pengurus/pengurus/create-pengurus', 'App\Http\Controllers\PengurusController@create');
Route::get('/pengurus/pengurus/{pengurus}', 'App\Http\Controllers\PengurusController@show');
Route::post('/pengurus/pengurus/create-pengurus', 'App\Http\Controllers\PengurusController@store');
Route::delete('/pengurus/pengurus/{pengurus}', 'App\Http\Controllers\PengurusController@destroy');
Route::get('/pengurus/pengurus/{pengurus}/edit', 'App\Http\Controllers\PengurusController@edit');
Route::patch('/pengurus/pengurus/{pengurus}', 'App\Http\Controllers\PengurusController@update');

// Organisasi
Route::get('/organisasi/organisasi', 'App\Http\Controllers\OrganisasiController@index');
Route::get('/pengurus/organisasi/create-organisasi', 'App\Http\Controllers\OrganisasiController@create');
// Route::get('/organisasi/organisasi/{organisasi}', 'App\Http\Controllers\OrganisasiController@show');
Route::post('/pengurus/organisasi/create-organisasi', 'App\Http\Controllers\OrganisasiController@store');
Route::delete('/organisasi/{organisasi}', 'App\Http\Controllers\OrganisasiController@destroy');
Route::get('/organisasi/{organisasi}/edit', 'App\Http\Controllers\OrganisasiController@edit');
Route::patch('/organisasi/organisasi/{organisasi}', 'App\Http\Controllers\OrganisasiController@update');

// Kegiatan
Route::get('/kegiatan/kegiatan', 'App\Http\Controllers\KegiatanController@index');
Route::get('/pengurus/kegiatan/create-kegiatan', 'App\Http\Controllers\KegiatanController@create');
Route::get('/kegiatan/kegiatan/{kegiatan}', 'App\Http\Controllers\KegiatanController@show');
Route::post('/pengurus/kegiatan/create-kegiatan', 'App\Http\Controllers\KegiatanController@store');
Route::delete('/kegiatan/kegiatan/{kegiatan}', 'App\Http\Controllers\KegiatanController@destroy');
Route::get('/kegiatan/kegiatan/{kegiatan}/edit', 'App\Http\Controllers\KegiatanController@edit');
Route::patch('/kegiatan/kegiatan/{kegiatan}', 'App\Http\Controllers\KegiatanController@update');

// Pengumuman
Route::get('/pengumuman/pengumuman', 'App\Http\Controllers\PengumumanController@index');
Route::get('/pengurus/pengumuman/create-pengumuman', 'App\Http\Controllers\PengumumanController@create');
Route::get('/pengumuman/pengumuman/{pengumuman}', 'App\Http\Controllers\PengumumanController@show');
Route::post('/pengurus/pengumuman/create-pengumuman', 'App\Http\Controllers\PengumumanController@store');
Route::delete('/pengumuman/pengumuman/{pengumuman}', 'App\Http\Controllers\PengumumanController@destroy');
Route::get('/pengumuman/pengumuman/{pengumuman}/edit', 'App\Http\Controllers\PengumumanController@edit');
Route::patch('/pengumuman/pengumuman/{pengumuman}', 'App\Http\Controllers\PengumumanController@update');

// Absensi
Route::get('/absensi/absensi', 'App\Http\Controllers\AbsensiController@index');
Route::get('/pengurus/absensi/create-absensi', 'App\Http\Controllers\AbsensiController@create');
Route::get('/absensi/absensi/{absensi}', 'App\Http\Controllers\AbsensiController@show');
Route::post('/pengurus/absensi/create-absensi', 'App\Http\Controllers\AbsensiController@store');
Route::delete('/absensi/absensi/{absensi}', 'App\Http\Controllers\AbsensiController@destroy');
Route::get('/absensi/absensi/{absensi}/edit', 'App\Http\Controllers\AbsensiController@edit');
Route::patch('/absensi/absensi/{absensi}', 'App\Http\Controllers\AbsensiController@update');

// Laporan Keuangan
Route::get('/laporan/laporan-keuangan', 'App\Http\Controllers\LaporanKeuanganController@index');
Route::get('/pengurus/laporan/create-laporan-keuangan', 'App\Http\Controllers\LaporanKeuanganController@create');
Route::get('/laporan/laporan-keuangan/{laporan-keuangan}', 'App\Http\Controllers\LaporanKeuanganController@show');
Route::post('/pengurus/laporan/create-laporan-keuangan', 'App\Http\Controllers\LaporanKeuanganController@store');
Route::delete('/laporan/laporan-keuangan/{laporan-keuangan}', 'App\Http\Controllers\LaporanKeuanganController@destroy');
Route::get('/laporan/laporan-keuangan/{laporan-keuangan}/edit', 'App\Http\Controllers\LaporanKeuanganController@edit');
Route::patch('/laporan/laporan-keuangan/{laporan-keuangan}', 'App\Http\Controllers\LaporanKeuanganKeuanganController@update');