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

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','FrontController@homepage')->name('homepage');

Route::get('tentang-kami','FrontController@about')->name('about');

Route::get('data-pengajar','FrontController@guru')->name('guru');

Route::get('agenda','FrontController@agenda')->name('agenda');

Route::get('pengumuman','FrontController@pengumuman')->name('pengumuman');

Route::get('pengumuman/{slug}','FrontController@pengumumanshow')->name('pengumumanshow');

Route::get('gallery','FrontController@gallery')->name('gallery');

Route::get('hubungi-kami','FrontController@kontak')->name('kontak');

Route::post('hubungi-kami','FrontController@message')->name('message');

Route::post('subscribe','FrontController@subscribe')->name('subscribe');

// Admin Login

Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');

Route::post('admin/login', 'Auth\AdminAuthController@postLogin');

Route::post('admin/logout', 'Auth\AdminAuthController@postLogout')->name('admin.logout');

Route::prefix('admin')->middleware('auth:admin')->group(function () {

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


     // Manage Siswa
    Route::get('siswa','SiswaController@index')->name('admin.siswa');

    Route::get('siswa/create','SiswaController@create')->name('admin.siswa.create');

    Route::post('siswa/create','SiswaController@store')->name('admin.siswa.store');

    Route::get('siswa/edit/{id}','SiswaController@edit')->name('admin.siswa.edit');

    Route::post('siswa/edit/{id}','SiswaController@update')->name('admin.siswa.update');

    Route::delete('siswa/destroy/{id}','SiswaController@destroy')->name('admin.siswa.destroy');


     // Manage Pengumuman
     Route::get('pengumuman','PengumumanController@index')->name('admin.pengumuman');

     Route::get('pengumuman/create','PengumumanController@create')->name('admin.pengumuman.create');
 
     Route::post('pengumuman/create','PengumumanController@store')->name('admin.pengumuman.store');
 
     Route::get('pengumuman/edit/{id}','PengumumanController@edit')->name('admin.pengumuman.edit');
 
     Route::post('pengumuman/edit/{id}','PengumumanController@update')->name('admin.pengumuman.update');
 
     Route::delete('pengumuman/destroy/{id}','PengumumanController@destroy')->name('admin.pengumuman.destroy');


      // Manage faq
     Route::get('faq','FaqController@index')->name('admin.faq');

     Route::get('faq/create','FaqController@create')->name('admin.faq.create');
 
     Route::post('faq/create','FaqController@store')->name('admin.faq.store');
 
     Route::get('faq/edit/{id}','FaqController@edit')->name('admin.faq.edit');
 
     Route::post('faq/edit/{id}','FaqController@update')->name('admin.faq.update');
 
     Route::delete('faq/destroy/{id}','FaqController@destroy')->name('admin.faq.destroy');

      // Manage Gallery
     Route::get('gallery','GalleryController@index')->name('admin.gallery');

     Route::get('gallery/create','GalleryController@create')->name('admin.gallery.create');
 
     Route::post('gallery/create','GalleryController@store')->name('admin.gallery.store');
 
     Route::get('gallery/edit/{id}','GalleryController@edit')->name('admin.gallery.edit');
 
     Route::post('gallery/edit/{id}','GalleryController@update')->name('admin.gallery.update');
 
     Route::delete('gallery/destroy/{id}','GalleryController@destroy')->name('admin.gallery.destroy');

     Route::get('gallery/album/create','GalleryController@createalbum')->name('admin.album.createalbum');
 
     Route::post('gallery/album/create','GalleryController@storealbum')->name('admin.album.storealbum');
 
     Route::get('album/edit/{id}','AlbumController@edit')->name('admin.album.edit');
 
     Route::post('album/edit/{id}','AlbumController@update')->name('admin.album.update');
 
     Route::delete('album/destroy/{id}','AlbumController@destroy')->name('admin.album.destroy');

       // General Settings

     Route::get('general/edit','GeneralController@edit')->name('admin.general.edit');
 
     Route::post('general/edit','GeneralController@update')->name('admin.general.update');

        // Manage Link
    Route::get('link','LinkController@index')->name('admin.link');

    Route::get('link/create','LinkController@create')->name('admin.link.create');

    Route::post('link/create','LinkController@store')->name('admin.link.store');

    Route::get('link/edit/{id}','LinkController@edit')->name('admin.link.edit');

    Route::post('link/edit/{id}','LinkController@update')->name('admin.link.update');

    Route::delete('link/destroy/{id}','LinkController@destroy')->name('admin.link.destroy');

    // Manage Banner

    Route::get('banner-slider','BannerController@index')->name('admin.banner');

    Route::get('banner-slider/create','BannerController@create')->name('admin.banner.create');

    Route::post('banner-slider/create','BannerController@store')->name('admin.banner.store');

    Route::get('banner-slider/edit/{id}','BannerController@edit')->name('admin.banner.edit');

    Route::post('banner-slider/edit/{id}','BannerController@update')->name('admin.banner.update');

    Route::delete('banner-slider/destroy/{id}','BannerController@destroy')->name('admin.banner.destroy');


    // Manage File

    Route::get('file','FileController@index')->name('admin.file');

    Route::get('file/create','FileController@create')->name('admin.file.create');

    Route::post('file/create','FileController@store')->name('admin.file.store');

    Route::get('file/edit/{id}','FileController@edit')->name('admin.file.edit');

    Route::post('file/edit/{id}','FileController@update')->name('admin.file.update');

    Route::delete('file/destroy/{id}','FileController@destroy')->name('admin.file.destroy');

});

// Siswa Login
Route::get('siswa/login', 'Auth\SiswaAuthController@getLogin')->name('siswa.login');
Route::post('siswa/login', 'Auth\SiswaAuthController@postLogin');
Route::post('siswa/logout', 'Auth\SiswaAuthController@postLogout')->name('siswa.logout');

Route::prefix('siswa')->middleware('auth:siswa')->group(function () {

    Route::get('dashboard','SiswaController@dashboard')->name('siswa.dashboard');

    Route::get('file/download','SiswaController@file')->name('siswa.file');

    Route::get('file/download/{id}','SiswaController@unduh')->name('siswa.file.unduh');

    Route::get('profile/edit/{id}','SiswaController@editprofile')->name('siswa.profile.edit');

    Route::post('profile/edit/{id}','SiswaController@updateprofile')->name('siswa.profile.update');

    
});

// Guru Login
Route::get('guru/login', 'Auth\GuruAuthController@getLogin')->name('guru.login');
Route::post('guru/login', 'Auth\GuruAuthController@postLogin');
Route::post('guru/logout', 'Auth\GuruAuthController@postLogout')->name('guru.logout');


Route::prefix('guru')->middleware('auth:guru')->group(function(){
 
    Route::get('dashboard', 'GuruController@dashboard' )->name('guru.dashboard');

    Route::get('profile/edit/{id}','GuruController@editprofile')->name('guru.profile.edit');

    Route::post('profile/edit/{id}','GuruController@updateprofile')->name('guru.profile.update');

});