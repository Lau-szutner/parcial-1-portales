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

Route::get('/login', [\App\Http\Controllers\DashboardController::class, 'login'])
    ->name('login');

Route::get('admin/dashboard', [\App\Http\Controllers\DashboardController::class, 'dashboard'])
    ->name('dashboard');

Route::get('admin/create', [\App\Http\Controllers\DashboardController::class, 'create'])
    ->name('create');

Route::post('admin/create', [\App\Http\Controllers\DashboardController::class, 'store'])
    ->name('store');

Route::get('admin/dashboard/{id}/eliminar', [\App\Http\Controllers\DashboardController::class, 'delete'])
    ->name('article.delete');

Route::post('admin/dashboard/{id}/destruir', [\App\Http\Controllers\DashboardController::class, 'destroy'])
    ->name('article.destroy');

Route::get('admin/dashboard/{id}/editar', [\App\Http\Controllers\DashboardController::class, 'edit'])
    ->name('article.edit');

Route::post('admin/dashboard/{id}/publicar', [\App\Http\Controllers\DashboardController::class, 'update'])
    ->name('article.update');

// Route::get('iniciar-sesion', [\App\Http\Controllers\DashboardControllerController::class, 'doLogin'])
//     ->name('auth.showLogin');

Route::get('admin/', [\App\Http\Controllers\DashboardController::class, 'doLogin'])
    ->name('admin.doLogin');
