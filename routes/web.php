<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');


Route::get('/cursos', [\App\Http\Controllers\CursosController::class, 'cursos'])
    ->name('cursos');


Route::get('/articulos', [\App\Http\Controllers\ArticulosController::class, 'articulos'])
    ->name('articulos');
