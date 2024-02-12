<?php

use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\PuestoController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/division/nueva',[DivisionController::class,'view'])->name('nueva.division');
Route::post('/division/guardar',[DivisionController::class,'store'])->name('guardar.division');
Route::get('/divisiones',[DivisionController::class,'index'])->name('divisiones');
Route::get('/divisiones/eliminar',[DivisionController::class,'delete'])->name('eliminar.division');
Route::get('/profesor/nueva',[ProfesorController::class,'view'])->name('nueva.profesor');
Route::post('/profesor/guardar',[ProfesorController::class,'store'])->name('guardar.profesor');
Route::get('/profesores',[ProfesorController::class,'index'])->name('profesores');
Route::get('/profesores/eliminar',[ProfesorController::class,'delete'])->name('eliminar.profesor');

Route::get('/puesto/nueva',[PuestoController::class,'view'])->name('nueva.puesto');
Route::post('/puesto/guardar',[PuestoController::class,'store'])->name('guardar.puesto');
Route::get('/puestos',[PuestoController::class,'index'])->name('puestos');
Route::get('/puestos/eliminar',[PuestoController::class,'delete'])->name('eliminar.puesto');

