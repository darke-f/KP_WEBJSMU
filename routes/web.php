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

Route::get('/pembelianNo', 'PembelianController@index_No');
Route::get('/showpembelianNo', 'PembelianController@show_No');
Route::get('/pembelianPer', 'PembelianController@index_Periode');
Route::get('/showpembelianPer', 'PembelianController@show_Periode');
Route::get('/pembelianBar', 'PembelianController@index_Barang');
Route::get('/showpembelianBar', 'PembelianController@show_Barang');
Route::get('/pembelianSup', 'PembelianController@index_Supplier');
Route::get('/showpembelianSup', 'PembelianController@show_Supplier');
Route::get('/indexpenjualans', 'PenjualanController@index');
Route::get('/showpenjualans', 'PenjualanController@show');

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

Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboardadmin', 'AdminController@index');
Route::get('/datawisata', 'AdminController@indexwisata');
Route::get('/dataevent', 'AdminController@indexevent');
Route::get('/datareview', 'AdminController@indexreview');
Route::get('/adminsetting', 'AdminController@setting');

Route::get('/pembelians', 'PembelianController@addBeli');
Route::post('/pembelians','PembelianController@addBeliPost');
Route::get('/penjualans', 'PenjualanController@addJual');
Route::post('/penjualans','PenjualanController@addJualPost');
