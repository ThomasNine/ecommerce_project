<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['prefix'=>'admin'],function(){
//     Route::get('/login',[PageController::class,'showLoginForm']);
//     Route::post('/login',[PageController::class,'login']);
//     Route::get('/',[PageController::class,'showDashboard']);
// });
Route::get('/admin/login',[PageController::class,'showLoginForm']);
Route::post('/admin/login',[PageController::class,'login']);

Route::group(['prefix'=>'admin','middleware'=>['Admin']],function(){
    Route::get('/',[PageController::class,'showDashboard']);
    Route::post('/logout',[PageController::class,'logout']);
    Route::resource('/category',CategoryController::class);
    Route::resource('/brand',BrandController::class);
    Route::resource('/color',ColorController::class);
    Route::resource('/product',ProductController::class);
    // product add
    Route::get('/create-product-add/{slug}',[ProductController::class,'createProductAdd']);
    Route::post('/create-product-add/{slug}',[ProductController::class,'storeProductAdd']);

    // product remove
    Route::get('/create-product-remove/{slug}',[ProductController::class,'createProductRemove']);
    Route::post('/create-product-remove/{slug}',[ProductController::class,'storeProductRemove']);

    //transactions
    Route::get('/product-add-transaction',[ProductController::class,'productAddTransaction']);
    Route::get('/product-remove-transaction',[ProductController::class,'productRemoveTransaction']);
});

