<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;

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
    return view('home.index');
});

Auth::routes();


Route::get('/product/{id}', [App\Http\Controllers\ProductsController::class, 'detail']);



Route::prefix('/admin')->namespace('Admin')->group(function(){

    //admin login 
    Route::get('/login',[App\Http\Controllers\Admin\AdminController::class, 'login']);
    Route::post('/login',[App\Http\Controllers\Admin\AdminController::class, 'login']);

Route::group(['middleware'=>['admin']], function(){

    //dashboard
    Route::get('/dashboard',[App\Http\Controllers\Admin\AdminController::class, 'dashboard']);

    //logout
    Route::get('/logout',[App\Http\Controllers\Admin\AdminController::class, 'logout']);




    //Product



    Route::get('/product',[App\Http\Controllers\Admin\ProductController::class, 'product']);
    Route::post('/update-product-status',[App\Http\Controllers\Admin\ProductController::class, 'updateProductStatus']);
    Route::get('/delete-product/{id}',[App\Http\Controllers\Admin\ProductController::class, 'deleteProduct']);
    Route::get('/add-edit-product/{id?}',[App\Http\Controllers\Admin\ProductController::class, 'addEditProduct']);
    Route::post('/add-edit-product/{id?}',[App\Http\Controllers\Admin\ProductController::class, 'addEditProduct']);


});

});
