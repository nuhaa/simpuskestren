<?php

// use Illuminate\Http\Request;

// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->name('apotek.index');
Route::get('/dashboard','DashboardController@index')->name('apotek.index');
Route::resource('/listmedicine', 'ListMedicineController', [ 'names' => 'apotek.listmedicine' ]);
Route::resource('/medicine', 'MedicineController', [ 'names' => 'apotek.medicine' ]);
Route::resource('/data-register', 'RegistrationController', [ 'names' => 'apotek.data-register' ]);
Route::get('/data-register/{id}/medicine', 'RegistrationController@medicine')->name('apotek.data-register.medicine');
Route::post('/update-status', 'RegistrationController@updateApotek')->name('apotek.update.status');
