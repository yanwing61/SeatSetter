<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsoleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/console/dashboard', [ConsoleController::class, 'dashboard']);
Route::get('/console/login', [ConsoleController::class, 'loginForm']);
Route::post('/console/login',[ConsoleController::class, 'login']);
Route::get('/console/logout', [ConsoleController::class, 'logout']);