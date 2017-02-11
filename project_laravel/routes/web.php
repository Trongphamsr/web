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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin'], function(){
    Route::group(['prefix'=>'cate'], function()
    {
        Route::get('add',['as'=>'admin.cate.getAdd', 'uses'=>'cate_controller@getAdd']);
        // thêm dữ liệu dùng post đẩy dữ liệu lên
        Route::post('add',['as'=>'admin.cate.postAdd', 'uses'=>'cate_controller@postAdd']);
        // get list dung  khi update dữ liệu trong post xong vào csdl chuyển về trang mình tự chọn
        Route::get('list', ['as'=>'admin.cate.list', 'uses'=>'cate_controller@getList']);


        Route::get('delete/{id}',['as'=>'admin.cate.getDelete', 'uses'=>'cate_controller@getDelete']);
        Route::get('edit/{id}',['as'=>'admin.cate.getEdit', 'uses'=>'cate_controller@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.cate.postEdit', 'uses'=>'cate_controller@postEdit']);
    });


    Route::group(['prefix'=>'product'], function(){
       Route::get('add', ['as'=>'admin.cate.getAdd','uses'=>'product_controller@getAdd']);
       Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'product_controller@postAdd']);
    });
});