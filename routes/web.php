<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Http;


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

Auth::routes();

Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/add', [Controllers\HomeController::class, 'add']);
Route::post('admin/store', [Controllers\HomeController::class, 'store']);
Route::get('admin/edit/{id}', [Controllers\HomeController::class, 'edit']);
Route::post('admin/update', [Controllers\HomeController::class, 'update']);
Route::get('admin/delete/{id}', [Controllers\HomeController::class, 'delete']);
Route::get('user/buy/{id}', [Controllers\HomeController::class, 'buy']);
Route::get('user/search', [Controllers\ApiController::class, 'check']);
Route::post('user/bus_id', [Controllers\ApiController::class, 'store']);




