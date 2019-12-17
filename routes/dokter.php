<?php

// use Illuminate\Http\Request;

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('dokter.index');

Route::resource('/poly', 'PolyController', [ 'names' => 'dokter.poly' ]);
Route::resource('/listmedicine', 'ListMedicineController', [ 'names' => 'dokter.listmedicine' ]);
Route::resource('/medicine', 'MedicineController', [ 'names' => 'dokter.medicine' ]);
Route::resource('/schedule', 'ScheduleController', [ 'names' => 'dokter.schedule' ]);
Route::resource('/data-register', 'RegistrationController', [ 'names' => 'dokter.data-register' ]);
Route::get('/data-register/{id}/check', 'RegistrationController@check')->name('dokter.data-register.check');
Route::post('/data-register/update-dokter', 'RegistrationController@updateDokter')->name('dokter.data-register.update-dokter');
