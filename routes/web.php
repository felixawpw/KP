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

Route::get('/', function () {
    return view('welcome');
});

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