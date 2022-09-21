<?php

use App\Http\Controllers\Api\EventController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {
    /***
     *Events routes
     *
     */
    Route::prefix('events')->group(function () {
        Route::get('/',[EventController::class,'index'])->name('api_routes');
        Route::get('/active-event',[EventController::class,'event_status']);
        Route::post('/', [EventController::class,'store']);
        Route::get('{id}',[EventController::class,'show']);
        Route::put('{id}',[EventController::class,'updateorcreate']);
        Route::patch('{id}',[EventController::class,'update']);
        Route::delete('{id}',[EventController::class,'destroy']);
    });
});
