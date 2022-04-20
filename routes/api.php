<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Auth routes
Route::group(['middleware' => 'api','prefix' => 'auth'], function($router)
{
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::group(['middleware' => 'JwtMiddleware'],function()
{
    //Users Api
    Route::get('/users',[UserController::class,'index']);
    Route::get('/user/{id}',[UserController::class,'show']);
    Route::post('/users',[UserController::class,'store']);
    Route::post('/users/{id}',[UserController::class,'update']);
    Route::post('/user/{id}',[UserController::class,'destroy']);
});

//User must be have token to be able to visit these routes
Route::group(['middleware' => ['JwtMiddleware','ApiLanguage']],function()
{
        //Posts Api
        Route::get('/posts',[PostController::class,'index']);
        Route::get('/post/{id}',[PostController::class,'show']);
        Route::post('/posts',[PostController::class,'store']);
        Route::post('/posts/{id}',[PostController::class,'update']);
        Route::post('/post/{id}',[PostController::class,'destroy']);
});
