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

Route::get('/', [Controller::class,"index"]);
Route::get('/register', [UserController::class, "register"]);
Route::post('/register', [UserController::class, "store"]);


Route::get('/login', [UserController::class, "login"])->name("login")->middleware("guest")->middleware("prevent-back-history");
Route::post('/authenticate', [UserController::class, "authenticate"]);

Route::post("/logout", [UserController::class, "logout"]);


Route::get('/admin', [AdminController::class, "login"])->middleware("guest")->middleware("prevent-back-history");
Route::post('/admin-authenticate', [AdminController::class, "authenticate"]);


Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth');