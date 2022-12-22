<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Prueba1Controller;
use App\Http\Controllers\OrdenCompraController;
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

Route::get('/', function () {
    return view('welcome');
});

// Trayendo la vista desde el controler
// Route::get('/prueba1', [Prueba1Controller::class, 'index'])->name("index");

// Haciendo Resource
// Route::resource('/prueba1', Prueba1Controller::class);

Route::resource('/compras', OrdenCompraController::class);