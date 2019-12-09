<?php

// use Illuminate\Http\Request;

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('admin.index');

Route::resource('/role', 'RoleController');
Route::resource('/permission', 'PermissionController');
Route::get('/position/get-data', 'PositionController@position')->name('position.data');
Route::resource('/position', 'PositionController');
Route::resource('/poly', 'PolyController');
Route::resource('/listmedicine', 'ListMedicineController');
Route::resource('/medicine', 'MedicineController');
Route::resource('/room', 'RoomController');
Route::resource('/user', 'UserController');
Route::resource('/schedule', 'ScheduleController');
