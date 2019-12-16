<?php

use Illuminate\Http\Request;

Route::get('/', 'Frontend\\HomeController@index')->name('homepage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/login', function () {
    return view('admin.login');
});
