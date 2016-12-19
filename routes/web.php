<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('test', function ()
{
    return view('layouts.main');
});


Route::get('/', 'BeritaController@index')->name('user.home');
Route::get('internal', 'BeritaController@internal');
Route::get('/alter', 'BeritaController@alternatif');

Route::post('/berita', 'BeritaController@tulis');
Route::get('/berita/{id}', 'BeritaController@show');
Route::get('/berita/{id}/internal', 'BeritaController@showInternal');
Route::post('/berita/{id}/komentar', 'BeritaController@postKomentar')->name('post.komentar');

Route::get('tulisberita', function () {
    $sifat = \App\Sifat::pluck('sifat', 'id');
    return view('berita.tulis', compact('sifat'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('public.home');

$s = 'social.';
Route::get('/social/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/{provider}/handle/callback',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);
