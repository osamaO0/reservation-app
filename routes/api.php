<?php

use App\Http\Controllers\Api\Auth\LoginApiController;
use App\Http\Controllers\Api\Auth\RegisterApiController;
use App\Http\Controllers\Api\RoomApiController;
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
Route::post('/login', [LoginApiController::class, 'login']);
Route::post('/register', [RegisterApiController::class, 'register']);
Route::get('/rooms/search', [RoomApiController::class, 'search']);
Route::post('/rooms/book/{room:id}', [RoomApiController::class, 'book']);

Route::middleware(['auth:sanctum'])->group(function () {

    // protected routes should be here

});

