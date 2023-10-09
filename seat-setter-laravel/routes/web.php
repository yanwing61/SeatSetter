<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GroupsController;
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

Route::get('/console/groups/list', [GroupsController::class, 'list'])->middleware('auth');
Route::get('/console/groups/delete/{group:group_id}', [GroupsController::class, 'delete'])->where('group', '[0-9]+')->middleware('auth');
Route::get('/console/groups/add', [GroupsController::class, 'addForm'])->middleware('auth');
Route::post('/console/groups/add', [GroupsController::class, 'add'])->middleware('auth');
Route::get('/console/groups/edit/{group:group_id}', [GroupsController::class, 'editForm'])->where('group', '[0-9]+')->middleware('auth');
Route::post('/console/groups/edit/{group:group_id}', [GroupsController::class, 'edit'])->where('group', '[0-9]+')->middleware('auth');


Route::get('/console/seating/seating', [SeatingController::class, 'index']);