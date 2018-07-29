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



//Auth::routes();

Route::get('/', 'ValidasiController@showLogin');
Route::get('login', 'ValidasiController@showLogin')->name('login');
Route::get('/admin', 'LoginController@show')->name('loginAdmin');
Route::post('/admin/login', 'LoginController@login')->name('doLogin');
Route::post('validasi/check', 'ValidasiController@check')->name('validasi.check');

Route::middleware(['auth'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('validasi', 'ValidasiController');
});

Route::get('check', function(){
	return Auth::check() ? "true" : "f";
});
Route::get('/logout', 'LoginController@logout')->name('logout')->middleware('auth');
Route::middleware(['admin'])->group(function () {
	Route::resource('admin/mahasiswa', 'MahasiswaController'); //X
	Route::resource('admin/barangbawaan', 'BarangBawaanController');
	Route::resource('admin/panitia', 'PanitiaController');
	Route::resource('admin/presensi', 'PresensiController');
	Route::resource('admin/pelanggaran', 'PelanggaranController');
	Route::resource('admin/kelompok', 'KelompokController');
	Route::resource('admin/jadwal', 'JadwalController');
	Route::resource('admin/maping', 'MapingController');
	Route::resource('admin/pelanggar', 'PelanggarController');
	Route::resource('admin/barang', 'BarangController');

	// Route::get('test', function(){ return view('layouts.master'); });
	// Route::get('json', 'BarangController@test');

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


	Route::get('pelanggar/edit/{nrp}/{panitia}/{sesi}/{pelanggaran}', 'PelanggarController@editOwn');
	Route::get('pelanggar/delete/{nrp}/{panitia}/{sesi}/{pelanggaran}', 'PelanggarController@destroy');
	Route::post('pelanggar/update/{nrp}/{panitia}/{sesi}/{pelanggaran}', 'PelanggarController@update')->name('updatepelanggar');

	Route::get('barangbawaan/edit/{nrp}/{panitia}/{sesi}', 'BarangBawaanController@editOwn');
	Route::get('barangbawaan/delete/{nrp}/{panitia}/{sesi}/{barang}', 'BarangBawaanController@destroy');

	Route::get('kelompok/delete/{kelompok}/{maping}', 'KelompokController@destroy');
	Route::get('presensi/delete/{nrp}/{sesi}', 'PresensiController@destroy');
});
