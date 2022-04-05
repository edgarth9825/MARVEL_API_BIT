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

Route::get('/', function(){
    return view('welcome');
});

//RUTAS DE SUCURSALES
Route::get('list-sucursales', 'sucursales\SucursalesController@list')->name('list.sucursales');
Route::get('add-sucursales', 'sucursales\SucursalesController@create')->name('create.sucursales');
Route::post('add-sucursales', 'sucursales\SucursalesController@store')->name('store.sucursales');
Route::get('details-sucursales/{sucursal}', 'sucursales\SucursalesController@details')->name('details.sucursales');
Route::patch('update-sucursales/{id_sucursales}', 'sucursales\SucursalesController@update')->name('update.sucursales');
Route::delete('delete-sucursales/{id_sucursales}', 'sucursales\SucursalesController@delete')->name('delete.sucursales');
Route::delete('delete-inevntory/{id_inventory}', 'sucursales\SucursalesController@delete_comic')->name('delete.inventory');

//RUTAS DE COMICS
Route::get('list-comics', 'comics\ComicsController@list')->name('list.comics');
Route::get('details-comics/{id}', 'comics\ComicsController@details')->name('details.comics');