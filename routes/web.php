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

Route::get('/all', 'CovidsController@index')->name('covids.index');
Route::get('/countries', 'CovidsController@countries')->name('covids.countries');

Route::get('/land/{name}', 'CovidsController@infosCountry')->name('covids.infos');

Route::post('/getinfos', 'CovidsController@getinfos')->name('covids.getinfos');
