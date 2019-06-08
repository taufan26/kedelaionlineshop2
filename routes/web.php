<?php

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

Route::get('/', 'Beranda_controller@index');

Route::get('/barang/show/{barang_id}', 'Beranda_controller@show');

Route::get('/test', function(){
	echo 'test';
});
Auth::routes();

// Add To Cart
Route::get('/add-to-cart/{id}', 'Beranda_controller@addToCart');

// Get cart/show cart views
Route::get('/shopping-cart', 'Cart_controller@index');
// Empty Cart
Route::get('/shopping-cart/destroy', 'Cart_controller@destroy');
// add qty Cart
Route::get('/shopping-cart/update/{id}', 'Cart_controller@update');
// kurangi qty item in cart
Route::get('/shopping-cart/kurangi/{id}', 'Cart_controller@kurangi');

// Barang berdasarkan kategori ========================================
Route::get('/barang/kategori/{kategori_id}', 'Beranda_controller@kategori');

Route::group(['middleware'=>'auth'], function(){
    // Checkout
    Route::get('/shopping-cart/checkout', 'Cart_controller@checkout');
    // bayar
    Route::post('/shopping-cart/bayar', 'Cart_controller@bayar');
    // Invoice
    Route::get('/invoice', 'Invoice_controller@index');
    // List Invoice
    Route::get('/invoice/list', 'Invoice_controller@list');
    // Detail Invoice
    Route::get('/invoice/detail/{pesanan_id}', 'Invoice_controller@detail');

    // Konfirmasi Pembayaran ==============================================
    Route::get('/konfirmasi', 'Konfirmasi_controller@index');
    Route::post('/konfirmasi/store', 'Konfirmasi_controller@store');

      Route::get('/myaccount', 'UsersController@edit')->name('users.edit');
      Route::post('/myaccounts', 'UsersController@update');


});


//ADMIN=========================================================================

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){


    Route::get('/', 'Admin_controller@index');
});
Route::get('/keluar', 'Admin_controller@logout');


// Master AdminBarang ================================================================
Route::get('barang', 'AdminBarang_controller@index');
Route::get('/barang/habis', 'AdminBarang_controller@habis');

// create barang
Route::get('/barang/create', 'AdminBarang_controller@create');

// store barang baru
Route::post('/barang/store', 'AdminBarang_controller@store');

// edit barang
Route::get('/barang/edit/{barang_id}', 'AdminBarang_controller@edit');

// update barang
Route::post('/barang/update/{barang_id}', 'AdminBarang_controller@update');

// Hapus AdminBarang
Route::get('/delete/barang/{barang_id}', 'AdminBarang_controller@delete');

// Show AdminBarang
Route::get('/barang/admin/show/{barang_id}', 'AdminBarang_controller@show');
// AdminBarang Habis
Route::get('/barang/habis', 'AdminBarang_controller@habis');
// ===============================================================================

// Master Kategori AdminBarang ============================================================
Route::get('/kategori', 'Kategori_controller@index');
// Edit Kategori
Route::get('/kategori/edit/{kategori_id}', 'Kategori_controller@edit');
// Update Kategori
Route::post('/kategori/update/{id}', 'Kategori_controller@update');
// Hapus Kategori
Route::get('/kategori/delete/{id}', 'Kategori_controller@delete');
// Kategori Create
Route::get('/kategori/create', 'Kategori_controller@create');
// Kategori Store
Route::post('/kategori/store', 'Kategori_controller@store');

// =============== KONFIRMASI PEMBAYARAN ===========================================================
Route::get('admin/konfirmasi', 'AdminKonfirmasi_controller@index');
// Detail AdminKonfirmasi
Route::get('/konfirmasi/detail/{id}', 'AdminKonfirmasi_controller@detail');
// Terima AdminKonfirmasi
Route::get('/konfirmasi/terima/{pesanan_id}', 'AdminKonfirmasi_controller@terima');
// Tolak AdminKonfirmasi
Route::get('/konfirmasi/tolak/{pesanan_id}', 'AdminKonfirmasi_controller@tolak');

// ========================= LIST PESANAN =================================
Route::get('/pesanan', 'Pesanan_controller@index');

Route::get('/base64', function(){
    $nama = \DB::table('base64')->value('nama');
    $hasil = base64_decode($nama);
    dd($hasil);
});


//Admin==============================================================



