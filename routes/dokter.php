<?php

// use Illuminate\Http\Request;

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('dokter.index');

Route::resource('/poly', 'PolyController');
Route::resource('/listmedicine', 'ListMedicineController');
Route::resource('/medicine', 'MedicineController');
Route::resource('/schedule', 'ScheduleController');
Route::resource('/data-register', 'RegistrationController');
