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

/*
Route::get('/', function () {
    return view('welcome');
});


Route::get('/user/{id}/{name}', function($id, $name){
    return 'This is user: ' .$name. ' with ID: '.$id;
});

Route::get('/hello', function(){
    return 'Hello World';
});


*/

Route::get('/', 'PagesController@index');

Route::get('/stocktable', 'StockController@showTable');
Route::get('/stocktable/calc/{month}&{year}', 'StockController@calcTable');
Route::get('/stocktable/closemonth/{month}&{year}', 'StockController@closeTable');
Route::get('/stocktable/closeyear/{month}&{year}', 'StockController@closeYear');

Route::get('/pembelianNo', 'PembelianController@index_No')->middleware('auth','reportbeliperm');
Route::get('/showpembelianNo', 'PembelianController@show_No')->middleware('auth','reportbeliperm');
Route::get('/pembelianPer', 'PembelianController@index_Periode')->middleware('auth','reportbeliperm');
Route::get('/showpembelianPer', 'PembelianController@show_Periode')->middleware('auth','reportbeliperm');
Route::get('/pembelianBar', 'PembelianController@index_Barang')->middleware('auth','reportbeliperm');
Route::get('/showpembelianBar', 'PembelianController@show_Barang')->middleware('auth','reportbeliperm');
Route::get('/pembelianSup', 'PembelianController@index_Supplier')->middleware('auth','reportbeliperm');
Route::get('/showpembelianSup', 'PembelianController@show_Supplier')->middleware('auth','reportbeliperm');
Route::get('/penjualanNo', 'PenjualanController@index_No')->middleware('auth','reportjualperm');
Route::get('/showpenjualanNo', 'PenjualanController@show_No')->middleware('auth','reportjualperm');
Route::get('/penjualanPer', 'PenjualanController@index_Periode')->middleware('auth','reportjualperm');
Route::get('/showpenjualanPer', 'PenjualanController@show_Periode')->middleware('auth','reportjualperm');
Route::get('/penjualanBar', 'PenjualanController@index_Barang')->middleware('auth','reportjualperm');
Route::get('/showpenjualanBar', 'PenjualanController@show_Barang')->middleware('auth','reportjualperm');
Route::get('/penjualanCus', 'PenjualanController@index_Customer')->middleware('auth','reportjualperm');
Route::get('/showpenjualanCus', 'PenjualanController@show_Customer')->middleware('auth','reportjualperm');
Route::get('/users','PagesController@user')->middleware('auth','adminperm');
Route::get('/users/{id}/edit','PagesController@userpermission')->middleware('auth','adminperm');
Route::put('/users/{id}','PagesController@updatepermission')->middleware('auth','adminperm');
Route::get('/changepassword', 'PagesController@showChangePasswordForm');
Route::post('/changePassword','PagesController@changePassword')->name('changePassword'); 

Auth::routes();
//Route::resource('posts','PostsController');
//Auth::routes();
/*Route::resources([
    'wisatas','WisatasController',
    'posts' => 'PostController'
]); */

//Route::resource('wisatas','WisatasController');
Route::resources([
    'adminwisatas' => 'AdminwisataController',
    'adminevents' => 'AdmineventController',
    'adminreviews' => 'AdminreviewController',
    'stockbarangs' => 'StockController',
    'masterbarangs' => 'MasterBarangController',
    'mastersuppliers' => 'MasterSupplierController',
    'mastercustomers' => 'MasterCustomerController'
]); 

Route::get('/dashboardadmin', 'AdminController@index');
Route::get('/datawisata', 'AdminController@indexwisata');
Route::get('/dataevent', 'AdminController@indexevent');
Route::get('/datareview', 'AdminController@indexreview');
Route::get('/adminsetting', 'AdminController@setting');

Route::get('/pembelians', 'PembelianController@addBeli')->middleware('auth','pembelianperm');
Route::post('/pembelians','PembelianController@addBeliPost')->middleware('auth','pembelianperm');
Route::get('/penjualans', 'PenjualanController@addJual')->middleware('auth','penjualanperm');
Route::post('/penjualans','PenjualanController@addJualPost')->middleware('auth','penjualanperm');
Route::get('/pembelians/{id}/edit', 'PembelianController@edit')->middleware('auth','pembelianperm');
Route::post('/pembelians/{id}/update','PembelianController@update')->middleware('auth','pembelianperm');
Route::get('/penjualans/{id}/edit', 'PenjualanController@edit')->middleware('auth','penjualanperm');
Route::post('/penjualans/{id}/update','PenjualanController@update')->middleware('auth','penjualanperm');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
