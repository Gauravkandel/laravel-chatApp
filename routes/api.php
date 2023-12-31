<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\chatController;
use App\Http\Controllers\userController;
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
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::group(['middleware' => 'api'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    // Route::get('/getuser', [userController::class, 'getUser']);
    Route::post('/messages', [chatController::class, 'message']);
});
Route::get('/messages/{senderId}/{receiverId}', [chatController::class, 'getMessages']);
Route::get("/getusers", [userController::class, 'getUsers']);
