<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, "index"]);
Route::get('/register', [UserController::class, "register"]);
Route::post('/register', [UserController::class, "store"])->name("storeUser");


Route::get('/login', [UserController::class, "login"])->name("login")->middleware("guest")->middleware("prevent-back-history");
Route::post('/authenticate', [UserController::class, "authenticate"]);

Route::post("/logout", [UserController::class, "logout"]);

Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');

    Route::middleware('is_admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/add_user', [AdminController::class, 'add_user'])->name('admin.add_user');
        Route::get('/edit_user/{id}', [AdminController::class, 'edit_user'])->name('admin.edit_user');
        Route::post('/update_user', [UserController::class, 'update'])->name("updateUser");
        Route::post('/delete_user/{id}', [UserController::class, "delete"])->name('admin.delete_user');
        Route::get('/events', [AdminController::class, 'events'])->name('admin.events');
        Route::get('/add_event', [AdminController::class, 'add_event'])->name('admin.add_event');
        Route::post('/store_event', [AdminController::class, 'storeEvent'])->name("admin.storeEvent");
        Route::get('/edit_event/{id}', [AdminController::class, 'edit_event'])->name('admin.edit_event');
        Route::post('/update_event', [AdminController::class, 'update_event'])->name("admin.updateEvent");
        Route::post('/delete_event/{id}', [AdminController::class, 'delete_event'])->name("admin.delete_Event");
    });

});