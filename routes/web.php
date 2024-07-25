<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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


Route::get('/', [MainController::class, 'homepage'])->name('mainhome')->middleware('authuser');
Route::get('/tracked/{parcel?}', [MainController::class, 'homeparceltracking'])->name('homeparceltracking')->middleware('authuser');

Route::middleware(['client'])->group(function () {
    Route::get('/client', [MainController::class, 'track'])->name('ctrack');
    Route::get('/client/tracked/{parcel?}', [MainController::class, 'tracked'])->name('ctracked');
    Route::get('/client/logs', [MainController::class, 'logs'])->name('clogs');
    Route::get('/client/profile', [MainController::class, 'prof'])->name('cprof');
});

Route::middleware(['incharge'])->group(function () {
    Route::get('/incharge', [MainController::class, 'inchargeindex'])->name('inchargeindex');
    Route::get('/incharge/parcel', [MainController::class, 'inchargeparcel'])->name('parcelpage');
    Route::get('/incharge/profile', [MainController::class, 'inchargeprofile'])->name('iprof');
    Route::get('/incharge/tracked/{parcel?}', [MainController::class, 'inchargetracked'])->name('itracked');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [MainController::class, 'adminindex'])->name('adminindex');
    Route::get('/admin/parcel', [MainController::class, 'adminparcel'])->name('adminparcel');
    Route::get('/admin/profile', [MainController::class, 'adminprofile'])->name('adminprofile');
    Route::get('/admin/adduser', [MainController::class, 'adminadduser'])->name('adminadduser');
    Route::get('/admin/tracked/{parcel?}', [MainController::class, 'admintracked'])->name('admintracked');
});