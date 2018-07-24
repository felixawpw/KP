<?php

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

use App\Barang;
use App\Http\Resources\Barangs as BarangCollection;

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('validasi', 'ValidasiController');
Route::resource('mahasiswa', 'MahasiswaController');
Route::resource('barangbawaan', 'BarangBawaanController');
Route::resource('panitia', 'PanitiaController');
Route::resource('presensi', 'PresensiController');
Route::resource('pelanggaran', 'PelanggaranController');
Route::resource('kelompok', 'KelompokController');
Route::resource('jadwal', 'JadwalController');
Route::resource('maping', 'MapingController');
Route::resource('pelanggar', 'PelanggarController');
Route::resource('barang', 'BarangController');

Route::post('validasi/check', 'ValidasiController@check')->name('validasi.check');

Route::get('test', function(){ return view('layouts.master'); });
Route::get('json', 'BarangController@test');

Route::get('table/json/mahasiswa', 'MahasiswaController@json');
Route::get('table/json/maping', 'MapingController@json');
Route::get('table/json/panitia', 'PanitiaController@json');
Route::get('table/json/pelanggaran', 'PelanggaranController@json');
Route::get('table/json/pelanggar', 'PelanggarController@json');
Route::get('table/json/absensi', 'PresensiController@json');
Route::get('table/json/barang', 'BarangController@json');
Route::get('table/json/barangbawaan', 'BarangBawaanController@json');
Route::get('table/json/kelompok', 'KelompokController@json');
Route::get('table/json/sesi', 'JadwalController@json');


Route::get('pelanggar/edit/{nrp}/{panitia}/{sesi}', 'PelanggarController@editOwn');
Route::get('pelanggar/delete/{nrp}/{panitia}/{sesi}', 'PelanggarController@destroy');

Route::get('barangbawaan/edit/{nrp}/{panitia}/{sesi}', 'BarangBawaanController@editOwn');
Route::get('barangbawaan/delete/{nrp}/{panitia}/{sesi}/{barang}', 'BarangBawaanController@destroy');

Route::get('kelompok/delete/{kelompok}/{maping}', 'KelompokController@destroy');
Route::get('presensi/delete/{nrp}/{sesi}', 'PresensiController@destroy');