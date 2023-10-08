<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\SeatingController;

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

Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest')->name('login');
Route::post('/console/login',[ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');

Route::get('/console/events/list', [EventsController::class, 'list'])->middleware('auth');
Route::get('/console/events/delete/{event:event_id}', [EventsController::class, 'delete'])->where('event', '[0-9]+')->middleware('auth');
Route::get('/console/events/add', [EventsController::class, 'addForm'])->middleware('auth');
Route::post('/console/events/add', [EventsController::class, 'add'])->middleware('auth');
Route::get('/console/events/edit/{event:event_id}', [EventsController::class, 'editForm'])->where('event', '[0-9]+')->middleware('auth');
Route::post('/console/events/edit/{event:event_id}', [EventsController::class, 'edit'])->where('event', '[0-9]+')->middleware('auth');

Route::get('/console/seating/seating', [SeatingController::class, 'index']);