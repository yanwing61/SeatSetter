<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\UsersController;
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
Route::get('/console/about', [ConsoleController::class, 'about'])->middleware('auth');
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest')->name('login');
Route::post('/console/login',[ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');

//EVENTS
Route::get('/console/events/list', [EventsController::class, 'list'])->middleware('auth');
Route::get('/console/events/delete/{event:event_id}', [EventsController::class, 'delete'])->where('event', '[0-9]+')->middleware('auth');
Route::get('/console/events/add', [EventsController::class, 'addForm'])->middleware('auth');
Route::post('/console/events/add', [EventsController::class, 'add'])->middleware('auth');
Route::get('/console/events/edit/{event:event_id}', [EventsController::class, 'editForm'])->where('event', '[0-9]+')->middleware('auth');
Route::post('/console/events/edit/{event:event_id}', [EventsController::class, 'edit'])->where('event', '[0-9]+')->middleware('auth');
Route::get('/console/events/detail/{event:event_id}', [EventsController::class, 'detail'])->middleware('auth');

//GROUPS
Route::get('/console/events/detail/{event:event_id}/groups/list', [GroupsController::class, 'list'])->middleware('auth');
Route::get('/console/events/detail/{event:event_id}/groups/delete/{group:group_id}', [GroupsController::class, 'delete'])->where('group', '[0-9]+')->middleware('auth');
Route::get('/console/events/detail/{event:event_id}/groups/add', [GroupsController::class, 'addForm'])->middleware('auth');
Route::post('/console/events/detail/{event:event_id}/groups/add', [GroupsController::class, 'add'])->middleware('auth');
Route::get('/console/events/detail/{event:event_id}/groups/edit/{group:group_id}', [GroupsController::class, 'editForm'])->where('group', '[0-9]+')->middleware('auth');
Route::post('/console/events/detail/{event:event_id}/groups/edit/{group:group_id}', [GroupsController::class, 'edit'])->where('group', '[0-9]+')->middleware('auth');

Route::get('/console/events/detail/{event:event_id}/tables/list', [TablesController::class, 'list'])->middleware('auth');
Route::get('/console/events/detail/{event:event_id}/tables/delete/{table:table_id}', [TablesController::class, 'delete'])->where('table', '[0-9]+')->middleware('auth');
Route::get('/console/events/detail/{event:event_id}/tables/add', [TablesController::class, 'addForm'])->middleware('auth');
Route::post('/console/events/detail/{event:event_id}/tables/add', [TablesController::class, 'add'])->middleware('auth');
Route::get('/console/events/detail/{event:event_id}/tables/edit/{table:table_id}', [TablesController::class, 'editForm'])->where('table', '[0-9]+')->middleware('auth');
Route::post('/console/events/detail/{event:event_id}/tables/edit/{table:table_id}', [TablesController::class, 'edit'])->where('table', '[0-9]+')->middleware('auth');


// basic CURD
// Route::get('/console/groups/list', [GroupsController::class, 'list'])->middleware('auth');
// Route::get('/console/groups/delete/{group:group_id}', [GroupsController::class, 'delete'])->where('group', '[0-9]+')->middleware('auth');
// Route::get('/console/groups/add', [GroupsController::class, 'addForm'])->middleware('auth');
// Route::post('/console/groups/add', [GroupsController::class, 'add'])->middleware('auth');
// Route::get('/console/groups/edit/{group:group_id}', [GroupsController::class, 'editForm'])->where('group', '[0-9]+')->middleware('auth');
// Route::post('/console/groups/edit/{group:group_id}', [GroupsController::class, 'edit'])->where('group', '[0-9]+')->middleware('auth');

Route::get('/console/guests/list', [GuestsController::class, 'list'])->middleware('auth');
Route::get('/console/guests/delete/{guest:guest_id}', [GuestsController::class, 'delete'])->where('guest', '[0-9]+')->middleware('auth');
Route::get('/console/guests/add', [GuestsController::class, 'addForm'])->middleware('auth');
Route::post('/console/guests/add', [GuestsController::class, 'add'])->middleware('auth');
Route::get('/console/guests/edit/{guest:guest_id}', [GuestsController::class, 'editForm'])->where('guest', '[0-9]+')->middleware('auth');
Route::post('/console/guests/edit/{guest:guest_id}', [GuestsController::class, 'edit'])->where('guest', '[0-9]+')->middleware('auth');

Route::get('/console/users/list', [UsersController::class, 'list'])->middleware('auth');
Route::get('/console/users/delete/{user:id}', [UsersController::class, 'delete'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/console/users/add', [UsersController::class, 'addForm'])->middleware('auth');
Route::post('/console/users/add', [UsersController::class, 'add'])->middleware('auth');
Route::get('/console/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/console/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');

Route::get('/console/seating/seating', [SeatingController::class, 'index']);