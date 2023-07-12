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
// , 'middleware' => 'auth'
Route::group(['prefix' => 'admin'], function (){
    //Route::get('/', [\App\Http\Controllers\admin\MainController::class, 'index'])->name('admin.main');
    Route::get('/{page}', [\App\Http\Controllers\Admin\MainController::class, 'index'])->where('page', '(.*)');
});

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('{page}', [\App\Http\Controllers\Client\MainController::class, 'index'])->where('page', '(.*)');


