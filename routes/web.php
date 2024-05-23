<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/',[MainController::class,'index']);
Route::post('/insertRecord', [MainController::class, 'insert']);
Route::post('/update', [MainController::class, 'update']);
Route::get('/deleteRecord/{id}', [MainController::class, 'delete']);
Route::get('/updateRecord/{id}', [MainController::class, 'edit']);