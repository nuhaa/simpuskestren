<?php

// use Illuminate\Http\Request;

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('admin.index');

Route::resource('/role', 'RoleController');
Route::resource('/permission', 'PermissionController');
Route::resource('/position', 'PositionController');
Route::resource('/poly', 'PolyController');
Route::resource('/medicine', 'MedicineController');
Route::resource('/room', 'RoomController');
