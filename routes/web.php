<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AbsensiImport;
use App\Models\Absensi;

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

    // Route::get('/', function () {
    //     return view('pengurus/login');
    // });

Route::get('/', function () {
    return view('pengurus/dashboard');
});

//Route::middleware(['guest'])->group(function (){
    // Login
    Route::get('pengurus/login', 'App\Http\Controllers\LoginController@index');
    Route::post('pengurus/login', 'App\Http\Controllers\LoginController@prosesLogin')->name('loginPost');

    // Logout
    Route::get('/logout', 'App\Http\Controllers\LoginController@logout');
    

    //Register
    Route::get('/register', 'App\Http\Controllers\RegisterController@index');
    Route::post('/register/store', 'App\Http\Controllers\RegisterController@store')->name('register');
//});


//Route::group(['middleware' => ['auth:anggota']], function (){
    Route::get('/pengurus/dashboard', 'App\Http\Controllers\LoginController@dashboardPengurus');
    
    // Anggota
    // Route::get('/anggota/anggota', 'App\Http\Controllers\AnggotaController@index');
    //index anggota
    Route::get('/pengurus/anggota/sekaa-teruna', 'App\Http\Controllers\AnggotaController@SekaaTeruna');
    Route::get('/pengurus/anggota/sekaa-gong', 'App\Http\Controllers\AnggotaController@SekaaGong');
    Route::get('/pengurus/anggota/sekaa-santi', 'App\Http\Controllers\AnggotaController@SekaaSanti');
    Route::get('/pengurus/anggota/pkk', 'App\Http\Controllers\AnggotaController@PKK');
    //tambah anggota
    Route::get('/pengurus/anggota/sekaa-teruna', 'App\Http\Controllers\AnggotaController@createSekaaTeruna');
    Route::get('/pengurus/anggota/sekaa-gong', 'App\Http\Controllers\AnggotaController@createSekaaGong');
    Route::get('/pengurus/anggota/sekaa-santi', 'App\Http\Controllers\AnggotaController@createSekaaSanti');
    Route::get('/pengurus/anggota/pkk', 'App\Http\Controllers\AnggotaController@createPKK');

    Route::post('/pengurus/anggota/sekaa-teruna', 'App\Http\Controllers\AnggotaController@storeSekaaTeruna');
    Route::post('/pengurus/anggota/sekaa-gong', 'App\Http\Controllers\AnggotaController@storeSekaaGong');
    Route::post('/pengurus/anggota/sekaa-santi', 'App\Http\Controllers\AnggotaController@storeSekaaSanti');
    Route::post('/pengurus/anggota/pkk', 'App\Http\Controllers\AnggotaController@storePKK');
    //tampil detail anggota
    Route::get('/anggota/sekaa-teruna/{anggota}', 'App\Http\Controllers\AnggotaController@showSekaaTeruna');
    Route::get('/anggota/sekaa-gong/{anggota}', 'App\Http\Controllers\AnggotaController@showSekaaGong');
    Route::get('/anggota/sekaa-santi/{anggota}', 'App\Http\Controllers\AnggotaController@showSekaaSanti');
    Route::get('/anggota/pkk/{anggota}', 'App\Http\Controllers\AnggotaController@showPKK');
    //hapus anggota
    Route::post('/pengurus/anggota/sekaa-teruna/{anggota}', 'App\Http\Controllers\AnggotaController@destroySekaaTeruna')->name('hapusSekaaTeruna');
    Route::post('/pengurus/anggota/sekaa-gong/{anggota}', 'App\Http\Controllers\AnggotaController@destroySekaaGong')->name('hapusSekaaGong');;
    Route::post('/pengurus/anggota/sekaa-santi/{anggota}', 'App\Http\Controllers\AnggotaController@destroySekaaSanti')->name('hapusSekaaSanti');;
    Route::delete('/pengurus/anggota/pkk/{anggota}', 'App\Http\Controllers\AnggotaController@destroyPKK')->name('hapusPKK');;
    //update anggota
    Route::get('/anggota/sekaa-teruna/{anggota}/edit', 'App\Http\Controllers\AnggotaController@editSekaaTeruna');
    Route::patch('/anggota/sekaa-teruna/{anggota}', 'App\Http\Controllers\AnggotaController@updateSekaaTeruna');
    Route::get('/anggota/sekaa-gong/{anggota}/edit', 'App\Http\Controllers\AnggotaController@editSekaaGong');
    Route::patch('/anggota/sekaa-gong/{anggota}', 'App\Http\Controllers\AnggotaController@updateSekaaGong');
    Route::get('/anggota/sekaa-santi/{anggota}/edit', 'App\Http\Controllers\AnggotaController@editSekaaSanti');
    Route::patch('/anggota/sekaa-santi/{anggota}', 'App\Http\Controllers\AnggotaController@updateSekaaSanti');
    Route::get('/anggota/pkk/{anggota}/edit', 'App\Http\Controllers\AnggotaController@editPKK');
    Route::patch('/anggota/pkk/{anggota}', 'App\Http\Controllers\AnggotaController@updatePKK');
    //cari anggota
    Route::get('/anggota/cariAnggota','App\Http\Controllers\AnggotaController@cariAnggota')->name('cariAnggota');
    

 
    // Pengurus
    Route::get('/pengurus-crud/pengurus', 'App\Http\Controllers\PengurusController@index');
    Route::get('/pengurus/pengurus-crud/pengurus', 'App\Http\Controllers\PengurusController@create');
    Route::get('/pengurus/pengurus-crud/{pengurus}', 'App\Http\Controllers\PengurusController@show');
    Route::post('/pengurus/pengurus-crud/pengurus', 'App\Http\Controllers\PengurusController@store');
    Route::delete('/pengurus/pengurus-crud/{pengurus}', 'App\Http\Controllers\PengurusController@destroy');
    Route::get('/pengurus/pengurus-crud/{pengurus}/edit', 'App\Http\Controllers\PengurusController@edit');
    Route::patch('/pengurus/pengurus-crud/{pengurus}', 'App\Http\Controllers\PengurusController@update');



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
Route::get('/kegiatan/kegiatan_pdf/{id}', 'App\Http\Controllers\KegiatanController@exportPDF')->name('exportPDF');
// Route::get('/kegiatan/kegiatan_pdf/{kegiatan}', 'App\Http\Controllers\KegiatanController@exportPDF')->name('exportPDF');

// Pengumuman
Route::get('/pengumuman/pengumuman', 'App\Http\Controllers\PengumumanController@index');
Route::get('/pengurus/pengumuman/create-pengumuman', 'App\Http\Controllers\PengumumanController@create');
Route::get('/pengumuman/pengumuman/{pengumuman}', 'App\Http\Controllers\PengumumanController@show');
Route::post('/pengurus/pengumuman/create-pengumuman', 'App\Http\Controllers\PengumumanController@store');
Route::delete('/pengumuman/pengumuman/{pengumuman}', 'App\Http\Controllers\PengumumanController@destroy');
Route::get('/pengumuman/pengumuman/{pengumuman}/edit', 'App\Http\Controllers\PengumumanController@edit');
Route::patch('/pengumuman/pengumuman/{pengumuman}', 'App\Http\Controllers\PengumumanController@update');
Route::get('/pengumuman/{id}/download', 'App\Http\Controllers\PengumumanController@download')->name('file.download');

// Absensi
Route::get('/absensi/absensi', 'App\Http\Controllers\AbsensiController@index');
Route::get('/pengurus/absensi/create-absensi', 'App\Http\Controllers\AbsensiController@create');
Route::get('/absensi/absensi/{absensi}', 'App\Http\Controllers\AbsensiController@show');
Route::post('/pengurus/absensi/create-absensi', 'App\Http\Controllers\AbsensiController@store');
Route::delete('/absensi/absensi/{absensi}', 'App\Http\Controllers\AbsensiController@destroy');
Route::get('/absensi/absensi/{absensi}/edit', 'App\Http\Controllers\AbsensiController@edit');
Route::patch('/absensi/absensi/{absensi}', 'App\Http\Controllers\AbsensiController@update');
Route::post('/absensi/import_absensi', 'App\Http\Controllers\AbsensiController@import_excel');
Route::get('/absensi/export_absensi', 'App\Http\Controllers\AbsensiController@export_excel')->name('export_absensi');
Route::get('/absensi/cariNama','App\Http\Controllers\AbsensiController@cariNama')->name('cariNama');
Route::get('/absensi/cariTanggal','App\Http\Controllers\AbsensiController@cariTanggal')->name('cariTanggal');
Route::get('/absensi/cariOrganisasi','App\Http\Controllers\AbsensiController@cariOrganisasi')->name('cariOrganisasi');


// Laporan Keuangan
Route::get('/laporan/laporan-keuangan', 'App\Http\Controllers\LaporanKeuanganController@index');
Route::get('/pengurus/laporan/create-laporan-keuangan', 'App\Http\Controllers\LaporanKeuanganController@create');
Route::get('/laporan/laporan-keuangan/{laporan-keuangan}', 'App\Http\Controllers\LaporanKeuanganController@show');
Route::post('/pengurus/laporan/create-laporan-keuangan', 'App\Http\Controllers\LaporanKeuanganController@store');
Route::delete('/laporan/laporan-keuangan/{laporan-keuangan}', 'App\Http\Controllers\LaporanKeuanganController@destroy');
Route::get('/laporan/laporan-keuangan/{laporan-keuangan}/edit', 'App\Http\Controllers\LaporanKeuanganController@edit');
Route::patch('/laporan/laporan-keuangan/{laporan-keuangan}', 'App\Http\Controllers\LaporanKeuanganController@update');
Route::get('/laporan-keuangan/export_laporan-keuangan', 'App\Http\Controllers\LaporanKeuanganController@export_excel')->name('export_laporan-keuangan');