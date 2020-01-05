<?php

Route::get('/dashboard', function () {
    return view('pasien.index');
})->name('pasien.index');
Route::get('/dashboard', 'DashboardController@index')->name('pasien.index');
Route::post('/form-tanggal', 'DashboardController@formTanggal')->name('pasien.form.tanggal');
Route::post('/store-antrian', 'DashboardController@storeAntrian')->name('pasien.store.antrian');
Route::get('/profile', 'ProfileController@index')->name('pasien.profile');
Route::post('/update-profile', 'ProfileController@update')->name('pasien.profile.update');
Route::get('/registration', 'RegistrationController@index')->name('pasien.registration');
Route::get('/export-pdf', 'RegistrationController@exportAntrian')->name('pasien.export.antrian');
Route::get('/medical-record', 'MedicalRecordController@index')->name('pasien.medical.record');
