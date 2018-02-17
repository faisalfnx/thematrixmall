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



Auth::routes();

Route::get('/images/{filename}', function ($filename)
{
	$path = public_path('images') . '/' . $filename;
	$file = File::get($path);
	$type = File::mimeType($path);
	$response = Response::make($file);
	$response->header("Content-Type", $type);
	return $response;
});


Route::get('back',function ()
{	
	return view('errors.go_back');
});

Route::get('logout',function ()
{
    Auth::logout();
    return redirect(url('login'));
});

Route::get('/','GuestController@index');
Route::get('daftarsupplier','HomeController@daftarsupplier');
Route::post('daftarsupplier/post','HomeController@daftarsupplierpost');
Route::get('successsupplier','HomeController@successsupplier');
Route::get('waitingsupplier','HomeController@waitingsupplier');
Route::post('verifedsupplier','HomeController@verifedsupplier');
Route::get('daftarcostumer','HomeController@daftarcostumer');
Route::get('successcostumer','HomeController@successcostumer');
Route::post('daftarcostumer/post','HomeController@daftarcostumerpost');
Route::get('showsupplier/{id}','CostumerController@showsupplier');
Route::get('search','HomeController@search');

Route::group(['prefix' => 'admin'] , function(){
	Route::group(['middleware' => 'admin'], function(){
		Route::get('/' , 'AdminController@index');
		Route::get('/approved/supplier/{id}','AdminController@approved');
		Route::get('delete/supplier/{id}','AdminController@deletesupplier');
		Route::get('jenistoko','AdminController@jenistoko');
		Route::get('add/jenistoko','AdminController@addjenistoko');
		Route::post('post/jenistoko','AdminController@postjenistoko');
		Route::get('edit/jenistoko/{id}','AdminController@editjenistoko');
		Route::post('update/jenistoko','AdminController@updatejenistoko');
		Route::get('delete/jenistoko/{id}','AdminController@deletejenistoko');
		Route::get('admin','AdminController@admin');
		Route::get('add','AdminController@addadmin');
		Route::post('post','AdminController@postadmin');
		Route::get('edit/{id}','AdminController@editadmin');
		Route::post('update','AdminController@updateadmin');
		Route::get('delete/{id}','AdminController@deleteadmin');
		Route::get('jenisproduk','AdminController@jenisproduk');
		Route::get('add/jenisproduk','AdminController@addjenisproduk');
		Route::post('post/jenisproduk','AdminController@postjenisproduk');
		Route::get('edit/jenisproduk/{id}','AdminController@editjenisproduk');
		Route::post('update/jenisproduk','AdminController@updatejenisproduk');
		Route::get('delete/jenisproduk/{id}','AdminController@deletejenisproduk');
		Route::get('rekapdatasupplier','AdminController@rekapdatasupplier');
	});

});

Route::group(['prefix' => 'supplier'] , function(){
	Route::group(['middleware' => 'supplier'], function(){
		Route::get('/', 'SupplierController@index');
		Route::get('produk','SupplierController@indexproduk');
		Route::get('transberhasil','SupplierController@indextransberhasil');
		Route::get('produk/add','SupplierController@addproduk');
		Route::post('produk/post','SupplierController@postproduk');
		Route::get('produk/edit/{id}','SupplierController@editproduk');
		Route::post('produk/update','SupplierController@updateproduk');
		Route::get('produk/delete/{id}','SupplierController@deleteproduk');
		Route::get('tunda/transaksiberhasil/{id}','SupplierController@tundatransaksi');
		Route::get('edit/profile/{id}','SupplierController@editprofile');
		Route::post('profile/post','SupplierController@profilepost');
		Route::get('approved/transaksi/{id}','SupplierController@approved');
		Route::get('delete/transaksi/{id}','SupplierController@deletetransaksi');
		Route::get('delete/transaksiberhasil/{id}','SupplierController@deletetransaksiberhasil');
		Route::get('produk/rekapdata','SupplierController@rekapdataproduk');

	});

});

Route::group(['prefix' => 'costumer'] , function(){
	Route::group(['middleware' => 'costumer'], function(){

		Route::get('' , 'GuestController@index');
		Route::get('transaksi/{id}','TransaksiController@index');
		Route::post('transaksi/post','TransaksiController@post');
		Route::get('successtransaksi','TransaksiController@success');
		Route::get('profile/{id}','CostumerController@editprofile');
		Route::post('profile/post','CostumerController@updateprofile');
		Route::get('transaksi','CostumerController@transaksi');
		Route::get('batalkan/transaksi/{id}','CostumerController@batalkantransaksi');
		Route::get('search/costumer','CostumerController@searchproduk');

	});

});