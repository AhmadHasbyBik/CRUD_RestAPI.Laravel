<?php

use App\Http\Controllers\Api\ShoeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', [ShoeController::class, 'GetAll']);
Route::get('/{id}', [ShoeController::class, 'GetById']);
Route::post('/', [ShoeController::class, 'Create']);
Route::put('/{id}', [ShoeController::class, 'Update']);
Route::delete('/{id}', [ShoeController::class, 'Delete']);