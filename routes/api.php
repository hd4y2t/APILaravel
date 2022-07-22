<?php

use App\Http\Controllers\API\CostumerController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProductKategoriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products',[ProductController::class,'all']);
Route::get('kategori',[ProductKategoriController::class,'all']);
Route::post('register',[CostumerController::class,'register']);