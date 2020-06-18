<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','FrontController@homepage')->name('homepage');

Route::get('tentang-kami','FrontController@about')->name('about');

Route::get('data-pengajar','FrontController@guru')->name('guru');

Route::get('agenda','FrontController@agenda')->name('agenda');

Route::get('pengumuman','FrontController@pengumuman')->name('pengumuman');

Route::get('hubungi-kami','FrontController@kontak')->name('kontak');


Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('dashboard','DashboardController@index')->name('admin.dashboard');

    Route::get('about','AboutController@edit')->name('admin.about.edit');

    Route::post('about','AboutController@update')->name('admin.about.update');

    // Manage Guru
    Route::get('guru','GuruController@index')->name('admin.guru');

    Route::get('guru/create','GuruController@create')->name('admin.guru.create');

    Route::post('guru/create','GuruController@store')->name('admin.guru.store');

    Route::get('guru/edit/{id}','GuruController@edit')->name('admin.guru.edit');

    Route::post('guru/edit/{id}','GuruController@update')->name('admin.guru.update');

    Route::delete('guru/destroy/{id}','GuruController@destroy')->name('admin.guru.destroy');

});