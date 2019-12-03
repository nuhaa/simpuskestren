<?php

Route::get('/dashboard', function () {
    return view('pasien.index');
})->name('pasien.index');

Route::get('/dashboard', 'DashboardController@index')->name('pasien.index');
Route::get('/profile', 'ProfileController@index')->name('pasien.profile');
Route::get('/registration', 'RegistrationController@index')->name('pasien.registration');
Route::get('/medical-record', 'MedicalRecordController@index')->name('pasien.medical.record');
