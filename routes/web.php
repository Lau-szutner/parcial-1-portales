<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');


Route::get('/cursos', [\App\Http\Controllers\CursosController::class, 'cursos'])
    ->name('cursos');

Route::get('/articulos', [\App\Http\Controllers\ArticulosController::class, 'articulos'])
    ->name('articulos');

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])
    ->name('login');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'dashboard'])
    ->name('dashboard');
