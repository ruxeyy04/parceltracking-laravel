<?php

use App\Http\Controllers\MainController;
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



Route::post('register', [MainController::class, 'register'])->name('register');
Route::post('login', [MainController::class, 'login'])->name('login');
Route::post('logout', [MainController::class, 'logout'])->name('logout');

Route::post('editprofile', [MainController::class, 'editprofile'])->name('editprofile');

Route::post('addparceldata', [MainController::class, 'addparcelData'])->name('addparcelData');
Route::post('deleteparcel', [MainController::class, 'deleteParcel'])->name('deleteParcel');
Route::post('editparcel', [MainController::class, 'editParcel'])->name('editParcel');

Route::post('adduser', [MainController::class, 'adduser'])->name('adduser');
Route::post('edituser', [MainController::class, 'edituser'])->name('edituser');
Route::post('deleteuser', [MainController::class, 'deleteuser'])->name('deleteuser');