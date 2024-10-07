<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');


Route::get('/cursos', [\App\Http\Controllers\CursosController::class, 'cursos'])
    ->name('cursos');

Route::get('/articulos', [\App\Http\Controllers\ArticlesController::class, 'index'])
    ->name('articulos.index');

Route::get('/articulos/{id}', [\App\Http\Controllers\ArticlesController::class, 'view'])
    ->name('articles.view')
    ->whereNumber('id');

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])
    ->name('login');

Route::get('admin/dashboard', [\App\Http\Controllers\DashboardController::class, 'dashboard'])
    ->name('admin.dashboard');


Route::get('admin/dashboard/create', [\App\Http\Controllers\DashboardController::class, 'create'])
    ->name('create');

Route::post('admin/dashboard/create', [\App\Http\Controllers\DashboardController::class, 'store'])
    ->name('store');

// Route::get('admin/dashboard/{id}', [\App\Http\Controllers\DashboardController::class, 'create'])
//     ->name('admin.dashboard.create');
