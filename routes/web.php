<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Web\V1\FamilyController;
use  App\Http\Controllers\Web\V1\TreeController;

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
  return  to_route('family.index');
});
//route family
Route::prefix('/family')->name('family.')->group(function () {
    Route::controller(FamilyController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::get('/data','data')->name('data');
        Route::get('/edit','edit')->name('edit');
        Route::post('/','store')->name('store');
        Route::post('/update','update')->name('update');
        Route::delete('/{id}','destroy')->name('delete');
    });
    Route::controller(TreeController::class)->group(function (){
        Route::get('/tree' ,'tree')->name('tree');
    });
});
