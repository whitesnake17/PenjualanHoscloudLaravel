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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/kategori','KategoriController@index');
Route::post('/kategori/store','KategoriController@store');
Route::post('/kategori/update','KategoriController@update');
Route::get('/kategori/delete/{id_kategori}','KategoriController@destroy');
Route::get('/kategori/edit/{id_kategori}','KategoriController@edit');

Route::get('/pelanggan','PelangganController@index');
Route::post('/pelanggan/store','PelangganController@store');
Route::post('/pelanggan/update','PelangganController@update');
Route::get('/pelanggan/delete/{id}','PelangganController@destroy');
Route::get('/pelanggan/edit/{id}','PelangganController@edit');

Route::get('/supplier','SupplierController@index');
Route::post('/supplier/store','SupplierController@store');
Route::post('/supplier/update','SupplierController@update');
Route::get('/supplier/delete/{id}','SupplierController@destroy');
Route::get('/supplier/edit/{id}','SupplierController@edit');

Route::get('/produk','ProdukController@index');
Route::post('/produk/store','ProdukController@store');
Route::post('/produk/update','ProdukController@update');
Route::get('/produk/delete/{id}','ProdukController@destroy');
Route::get('/produk/edit/{id}','ProdukController@edit');


Route::get('/produkmasuk','ProdukmasukController@index');
Route::post('/produkmasuk/store','ProdukmasukController@store');
Route::post('/produkmasuk/update','ProdukmasukController@update');
Route::get('/produkmasuk/edit/{id_produkmasuk}','ProdukmasukController@edit');

Route::get('/transaksi','TransaksiController@index');
Route::get('/transaksi/autocomplete_pelanggan','TransaksiController@autocomplete_pelanggan');
Route::post('/masuk/sementara','TransaksiController@store');
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'TransaksiController@autocomplete'));
Route::get('/ambil','TransaksiController@ambil');
Route::get('/transaksi/delete/{id}','TransaksiController@destroy');
Route::post('/transaksi/semua','TransaksiController@storesurya');
Route::post('/transaksi/detail','TransaksiController@store');

Route::get('/cetak/{kode_transaksi}','TransaksiController@cetak');