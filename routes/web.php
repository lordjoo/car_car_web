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
    return view('welcome');
});
Route::get('/reserve',[\App\Http\Controllers\FrontController::class,'reserveView'])->name('reserve');
Route::post('/reserve',[\App\Http\Controllers\FrontController::class,'reservePost'])->name('reserve');
Route::get('/bundles/getPrices/{id?}',[\App\Http\Controllers\BundleController::class,'getPrices'])->name('bundle.getPrices');
Route::group(['middleware'=>"auth",'prefix'=>"admin"],function () {
    Route::get('/',[\App\Http\Controllers\HomeController::class,'home']);
    Route::get('/orders',[\App\Http\Controllers\HomeController::class,'orders'])->name('orders');

    Route::resource('bundles',\App\Http\Controllers\BundleController::class);
    Route::post('/bundles/addPrice',[\App\Http\Controllers\BundleController::class,'addPrice'])->name('bundles.addPrice');
    Route::get('/bundles/getPrices/{id?}',[\App\Http\Controllers\BundleController::class,'getPrices'])->name('bundles.getPrices');
    Route::get('/bundles/delPrices/{id?}',[\App\Http\Controllers\BundleController::class,'delPrices'])->name('bundles.delPrices');
    Route::patch('bundles/update/{bundle?}',[\App\Http\Controllers\BundleController::class,'update'])->name('bundles.update');

    // CarTypes Routes
    Route::resource('cars',\App\Http\Controllers\CarTypeController::class);
    Route::patch('cars/update/{car?}',[\App\Http\Controllers\CarTypeController::class,'update'])->name('cars.update');
    Route::get('cars/delete/{car}',[\App\Http\Controllers\CarTypeController::class,'destroy'])->name('cars.destroy');
});
