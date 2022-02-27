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


//==============================PENGURUS==============================

// Route::get('/', function () {
//     return view('welcome');
// });

    Route::get('/', function () {
        return view('pengurus/login');
    });

// Route::get('/', function () {
//     return view('pengurus/dashboard');
// });

//Route::middleware(['guest'])->group(function (){
    // Login
    Route::get('pengurus/login', 'App\Http\Controllers\LoginController@indexPengurus');
    Route::post('pengurus/login', 'App\Http\Controllers\LoginController@prosesLogin')->name('loginPost');

    // Logout
    Route::get('/logout', 'App\Http\Controllers\LoginController@logout');
    

   
//});


//Route::group(['middleware' => ['auth:anggota']], function (){
    Route::get('/pengurus/dashboard', 'App\Http\Controllers\LoginController@dashboardPengurus');
    
    // Anggota
    // Route::get('/anggota/anggota', 'App\Http\Controllers\AnggotaController@index');
    //index anggota
    Route::get('/anggota/sekaa-teruna', 'App\Http\Controllers\AnggotaController@SekaaTeruna');
    Route::get('/anggota/sekaa-gong', 'App\Http\Controllers\AnggotaController@SekaaGong');
    Route::get('/anggota/sekaa-santi', 'App\Http\Controllers\AnggotaController@SekaaSanti');
    Route::get('/anggota/pkk', 'App\Http\Controllers\AnggotaController@PKK');
    //tambah anggota
    Route::post('/pengurus/anggota/sekaa-teruna', 'App\Http\Controllers\AnggotaController@storeSekaaTeruna')->name('tambahSekaaTeruna');
    Route::post('/pengurus/anggota/sekaa-gong', 'App\Http\Controllers\AnggotaController@storeSekaaGong')->name('tambahSekaaGong');
    Route::post('/pengurus/anggota/sekaa-santi', 'App\Http\Controllers\AnggotaController@storeSekaaSanti')->name('tambahSekaaSanti');
    Route::post('/pengurus/anggota/pkk', 'App\Http\Controllers\AnggotaController@storePKK')->name('tambahPKK');
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
    Route::patch('/anggota/sekaa-teruna/{anggota}', 'App\Http\Controllers\AnggotaController@updateSekaaTeruna');
    Route::patch('/anggota/sekaa-gong/{anggota}', 'App\Http\Controllers\AnggotaController@updateSekaaGong');
    Route::patch('/anggota/sekaa-santi/{anggota}', 'App\Http\Controllers\AnggotaController@updateSekaaSanti');
    Route::patch('/anggota/pkk/{anggota}', 'App\Http\Controllers\AnggotaController@updatePKK');
    //cari anggota
    Route::get('/anggota/cariSekaaTeruna','App\Http\Controllers\AnggotaController@cariSekaaTeruna')->name('cariSekaaTeruna');
    Route::get('/anggota/cariSekaaGong','App\Http\Controllers\AnggotaController@cariSekaaGong')->name('cariSekaaGong');
    Route::get('/anggota/cariSekaaSanti','App\Http\Controllers\AnggotaController@cariSekaaSanti')->name('cariSekaaSanti');
    Route::get('/anggota/cariPKK','App\Http\Controllers\AnggotaController@cariPKK')->name('cariPKK');
    
    
    // Pengurus
    Route::get('/pengurus-crud/pengurus', 'App\Http\Controllers\PengurusController@index');
    // Route::get('/pengurus/pengurus-crud/pengurus', 'App\Http\Controllers\PengurusController@create');
    Route::get('/pengurus-crud/pengurus/{pengurus}', 'App\Http\Controllers\PengurusController@show')->name('showPengurus');
    Route::post('/pengurus/pengurus-crud/pengurus', 'App\Http\Controllers\PengurusController@store')->name('tambahPengurus');
    Route::delete('/pengurus/pengurus-crud/pengurus/{pengurus}', 'App\Http\Controllers\PengurusController@destroy')->name('hapusPengurus');
    // Route::get('/pengurus/pengurus-crud/{pengurus}/edit', 'App\Http\Controllers\PengurusController@edit');
    Route::patch('/pengurus-crud/pengurus/{pengurus}', 'App\Http\Controllers\PengurusController@update');
    Route::patch('/pengurus-crud/profil-pengurus/{pengurus}', 'App\Http\Controllers\PengurusController@updateProfil');
    Route::get('/pengurus-crud/profil-pengurus', 'App\Http\Controllers\PengurusController@profil');
    Route::get('/pengurus/cariPengurus','App\Http\Controllers\PengurusController@cariPengurus')->name('cariPengurus');
  
    // Route::get('/pengurus-crud/profil-pengurus/change-password', 'App\Http\Controllers\PengurusController@changePassword')->name('change_password');
    Route::patch('/pengurus-crud/profil-pengurus', 'App\Http\Controllers\PengurusController@updatePassword')->name('update_password');



    // Organisasi
    Route::get('/organisasi/organisasi', 'App\Http\Controllers\OrganisasiController@index');
    // Route::get('/pengurus/organisasi/organisasi', 'App\Http\Controllers\OrganisasiController@create');
    Route::post('/pengurus/organisasi/organisasi', 'App\Http\Controllers\OrganisasiController@store')->name('tambahOrganisasi');
    Route::delete('/organisasi/organisasi/{organisasi}', 'App\Http\Controllers\OrganisasiController@destroy');
    // Route::get('/organisasi/organisasi/{organisasi}/edit', 'App\Http\Controllers\OrganisasiController@edit');
    Route::patch('/organisasi/organisasi/{organisasi}', 'App\Http\Controllers\OrganisasiController@update')->name('editOrganisasi');

    // Kegiatan
    Route::get('/kegiatan/kegiatan', 'App\Http\Controllers\KegiatanController@index');
    // Route::get('/pengurus/kegiatan/kegiatan', 'App\Http\Controllers\KegiatanController@create');
    Route::get('/kegiatan/kegiatan/{kegiatan}', 'App\Http\Controllers\KegiatanController@show');
    Route::post('/pengurus/kegiatan/kegiatan', 'App\Http\Controllers\KegiatanController@store');
    Route::delete('/kegiatan/kegiatan/{kegiatan}', 'App\Http\Controllers\KegiatanController@destroy');
    // Route::get('/kegiatan/kegiatan/{kegiatan}/edit', 'App\Http\Controllers\KegiatanController@edit');
    Route::patch('/kegiatan/kegiatan/{kegiatan}', 'App\Http\Controllers\KegiatanController@update');
    Route::get('/kegiatan/kegiatan_pdf/{id}', 'App\Http\Controllers\KegiatanController@exportPDF')->name('exportPDF');
    // Route::get('/kegiatan/kegiatan_pdf/{kegiatan}', 'App\Http\Controllers\KegiatanController@exportPDF')->name('exportPDF');
    Route::get('/kegiatan/cariKegiatan','App\Http\Controllers\KegiatanController@cariKegiatan')->name('cariKegiatan');
    Route::post('/kegiatan/filterTanggal','App\Http\Controllers\KegiatanController@filterTanggal')->name('filterTanggalKegiatan');

    // Pengumuman
    Route::get('/pengumuman/pengumuman', 'App\Http\Controllers\PengumumanController@index');
    // Route::get('/pengurus/pengumuman/pengumuman', 'App\Http\Controllers\PengumumanController@create');
    Route::get('/pengumuman/pengumuman/{pengumuman}', 'App\Http\Controllers\PengumumanController@show');
    Route::post('/pengurus/pengumuman/pengumuman', 'App\Http\Controllers\PengumumanController@store');
    Route::delete('/pengumuman/pengumuman/{pengumuman}', 'App\Http\Controllers\PengumumanController@destroy');
    // Route::get('/pengumuman/pengumuman/{pengumuman}/edit', 'App\Http\Controllers\PengumumanController@edit');
    Route::patch('/pengumuman/pengumuman/{pengumuman}', 'App\Http\Controllers\PengumumanController@update');
    Route::get('/pengumuman/{id}/download', 'App\Http\Controllers\PengumumanController@download')->name('file.download');
    Route::get('/pengumuman/cariPengumuman','App\Http\Controllers\PengumumanController@cariPengumuman')->name('cariPengumuman');
    
    // Absensi
    Route::get('/absensi/absensi', 'App\Http\Controllers\AbsensiController@index');
    // Route::get('/pengurus/absensi/create-absensi', 'App\Http\Controllers\AbsensiController@create');
    // Route::get('/absensi/absensi/{absensi}', 'App\Http\Controllers\AbsensiController@show');
    // Route::post('/pengurus/absensi/create-absensi', 'App\Http\Controllers\AbsensiController@store');
    Route::delete('/absensi/absensi/{absensi}', 'App\Http\Controllers\AbsensiController@destroy');
    // Route::get('/absensi/absensi/{absensi}/edit', 'App\Http\Controllers\AbsensiController@edit');
    Route::patch('/absensi/absensi/{absensi}', 'App\Http\Controllers\AbsensiController@update')->name('editAbsensi');
    Route::post('/absensi/import_absensi', 'App\Http\Controllers\AbsensiController@import_excel');
    Route::get('/absensi/export_absensi', 'App\Http\Controllers\AbsensiController@export_excel')->name('export_absensi');
    Route::get('/absensi/cariAbsensi','App\Http\Controllers\AbsensiController@cariAbsensi')->name('cariAbsensi');
    Route::post('/absensi/filterTanggal','App\Http\Controllers\AbsensiController@filterTanggal')->name('filterTanggalAbsensi');
    Route::get('/absensi/cariOrganisasi','App\Http\Controllers\AbsensiController@cariOrganisasi')->name('cariOrganisasi');
 


    // Laporan Keuangan
    Route::get('/laporan/laporan-keuangan', 'App\Http\Controllers\LaporanKeuanganController@index');
    // Route::get('/pengurus/laporan/laporan-keuangan', 'App\Http\Controllers\LaporanKeuanganController@create');
    Route::get('/laporan/laporan-keuangan/{laporan-keuangan}', 'App\Http\Controllers\LaporanKeuanganController@show');
    Route::post('/pengurus/laporan/laporan-keuangan', 'App\Http\Controllers\LaporanKeuanganController@store')->name('tambahLaporan');
    Route::delete('/laporan/laporan-keuangan/{laporan-keuangan}', 'App\Http\Controllers\LaporanKeuanganController@destroy')->name('hapusLaporan');
    // Route::get('/laporan/laporan-keuangan/{laporan-keuangan}/edit', 'App\Http\Controllers\LaporanKeuanganController@edit');
    Route::patch('/laporan/laporan-keuangan/{id}', 'App\Http\Controllers\LaporanKeuanganController@update')->name('editLaporan');
    Route::get('/laporan-keuangan/export_laporan-keuangan', 'App\Http\Controllers\LaporanKeuanganController@export_excel')->name('export_laporan-keuangan');
    Route::post('/laporan-keuangan/filterTanggal','App\Http\Controllers\LaporanKeuanganController@filterTanggal')->name('filterTanggalKeuangan');
    // Route::get('/laporan-keuangan-pdf/{laporan-keuangan}', 'App\Http\Controllers\LaporanKeuanganController@exportPDF')->name('exportPDF');



    //=====================================ANGGOTA================================
    // Route::get('/', function () {
    //     return view('anggota/dashboard-anggota');
    // });

     // Login
     Route::get('anggota/login', 'App\Http\Controllers\LoginController@indexAnggota');
     Route::post('anggota/login', 'App\Http\Controllers\LoginController@prosesLoginAnggota')->name('loginPostAnggota');
     Route::get('/dashboard-anggota', 'App\Http\Controllers\LoginController@dashboardAnggota');
     Route::patch('/dashboard-anggota/{anggota}', 'App\Http\Controllers\AnggotaController@updateProfil')->name('updateProfil');
     Route::patch('/dashboard-anggota', 'App\Http\Controllers\AnggotaController@updatePassword')->name('update_password');

    //Register
    Route::get('/register', 'App\Http\Controllers\RegisterController@index');
    Route::post('/register/store', 'App\Http\Controllers\RegisterController@store')->name('register');
 
     Route::get('/pengumuman', 'App\Http\Controllers\PengumumanController@indexAnggota');
    
     Route::get('/kegiatan', 'App\Http\Controllers\KegiatanController@indexAnggota');
     Route::get('/absensi', 'App\Http\Controllers\AbsensiController@indexAnggota');
     Route::get('/laporan-keuangan', 'App\Http\Controllers\LaporanKeuanganController@indexAnggota');
     Route::get('/pengumuman/cariPengumumanAnggota','App\Http\Controllers\PengumumanController@cariPengumumanAnggota')->name('cariPengumumanAnggota');
     Route::get('/kegiatan/cariKegiatanAnggota','App\Http\Controllers\KegiatanController@cariKegiatanAnggota')->name('cariKegiatanAnggota');
    
     
     // Logout
     Route::get('/logout', 'App\Http\Controllers\LoginController@logoutAnggota');


    // Route::get('/kegiatan/{kegiatan}', 'App\Http\Controllers\KegiatanController@show')->name('showKegiatan');

