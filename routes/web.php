<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsDataController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [CmsDataController::class, 'index']);
Route::get('/admin/home', [CmsDataController::class, 'indexManagement']);
Route::get('/admin', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

