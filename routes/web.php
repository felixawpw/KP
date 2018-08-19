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
Route::get('/home', 'ValidasiController@showLogin')->name('login');
Route::get('/admin', 'LoginController@show')->name('loginAdmin');
Route::post('/admin/login', 'LoginController@login')->name('doLogin');
Route::post('validasi/check', 'ValidasiController@check')->name('validasi.check');

Route::middleware(['auth'])->group(function(){
	Route::get('profile', 'ProfileController@show')->name('profile.index');
	Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
	Route::post('profile/edit', 'ProfileController@update')->name('profile.update');
});
Route::middleware(['mahasiswa'])->group(function () {
	Route::post('validasi/tahap1', 'ValidasiController@store1')->name('validasi1.store');
	Route::post('validasi/tahap2', 'ValidasiController@store2')->name('validasi2.store');
	Route::get('validasi/tahap1', 'ValidasiController@create1')->name('validasi1');
	Route::get('validasi/tahap2', 'ValidasiController@create2')->name('validasi2');
	Route::get('validasi/pelanggaran', 'ValidasiController@pelanggaran')->name('validasi.pelanggaran');
	Route::get('validasi/presensi', 'ValidasiController@presensi')->name('validasi.presensi');
	Route::get('validasi/barang', 'ValidasiController@barang')->name('validasi.barang');

	Route::get('table/json/mahasiswa/pelanggaran', 'ValidasiController@pelanggaranJson')->name('mhs_pelanggaran');
	Route::get('table/json/mahasiswa/presensi', 'ValidasiController@presensiJson')->name('mhs_presensi');
	Route::get('table/json/mahasiswa/barang', 'ValidasiController@barangJson')->name('mhs_barang');
});

Route::get('check', function(){
	return Auth::check() ? "true" : "f";
});
Route::get('/logout', 'LoginController@logout')->name('logout')->middleware('auth');

Route::middleware(['admin'])->group(function () {
	Route::get('/homeAdmin', 'HomeController@index')->name('home');
	Route::resource('mahasiswa', 'MahasiswaController'); //X
	Route::resource('barangbawaan', 'BarangBawaanController');
	Route::resource('panitia', 'PanitiaController');
	Route::resource('presensi', 'PresensiController');
	Route::resource('pelanggaran', 'PelanggaranController');
	Route::resource('kelompok', 'KelompokController');
	Route::resource('jadwal', 'JadwalController');
	Route::resource('maping', 'MapingController');
	Route::resource('pelanggar', 'PelanggarController');
	Route::resource('barang', 'BarangController');
	Route::resource('recup', 'RecupController');

	// Route::get('test', function(){ return view('layouts.master'); });
	// Route::get('json', 'BarangController@test');

	Route::get('table/json/mahasiswa', 'MahasiswaController@json')->name('jsonmhs');
	Route::get('table/json/maping', 'MapingController@json')->name('jsonmaping');
	Route::get('table/json/panitia', 'PanitiaController@json')->name('jsonpanitia');
	Route::get('table/json/pelanggaran', 'PelanggaranController@json')->name('jsonpelanggaran');
	Route::get('table/json/pelanggar', 'PelanggarController@json')->name('jsonpelanggar');
	Route::get('table/json/absensi', 'PresensiController@json')->name('jsonabsensi');
	Route::get('table/json/barang', 'BarangController@json')->name('jsonbarang');
	Route::get('table/json/barangbawaan', 'BarangBawaanController@json')->name('jsonbawaan');
	Route::get('table/json/kelompok', 'KelompokController@json')->name('jsonkelompok');
	Route::get('table/json/sesi', 'JadwalController@json')->name('jsonsesi');
	Route::get('table/json/recup', 'RecupController@json')->name('jsonrecup');
	Route::get('table/json/recup/{id}', 'RecupController@jsonPeserta')->name('jsonpeserta');

	Route::get('pelanggar/edit/{nrp}/{panitia}/{sesi}/{pelanggaran}', 'PelanggarController@editOwn');
	Route::get('pelanggar/delete/{nrp}/{panitia}/{sesi}/{pelanggaran}', 'PelanggarController@destroy');
	Route::post('pelanggar/update/{nrp}/{panitia}/{sesi}/{pelanggaran}', 'PelanggarController@update')->name('updatepelanggar');

	Route::get('barangbawaan/edit/{nrp}/{panitia}/{sesi}', 'BarangBawaanController@editOwn');
	Route::get('barangbawaan/delete/{nrp}/{panitia}/{sesi}/{barang}', 'BarangBawaanController@destroy');

	Route::get('kelompok/delete/{kelompok}/{maping}', 'KelompokController@destroy');
	Route::get('presensi/delete/{nrp}/{sesi}', 'PresensiController@destroy');

	Route::get('/convert/to/php', 'HomeController@convertToPhp');
});
Route::get('report', 'HomeController@report');