<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');

/***
 *Events routes
 *
 *
 */
Route::prefix('events')->group(function () {
    Route::get('/',[EventController::class,'index'])->name('events.index');
    Route::get('/create',[EventController::class,'create'])->name('events.create');
    Route::post('/', [EventController::class,'store'])->name('events.store');
    Route::get('/{id}',[EventController::class,'show'])->name('events.show');
    Route::get('edit/{id}',[EventController::class,'edit'])->name('events.edit');
    Route::patch('edit/{id}',[EventController::class,'update'])->name('events.update');
    Route::delete('{id}',[EventController::class,'destroy'])->name('events.destroy');
    Route::post('search_filter',[EventController::class,'search_filter'])->name('events.search_filter');
});
