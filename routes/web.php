<?php

use App\Http\Middleware\CheckRole;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');


Route::get('/cursos', [\App\Http\Controllers\CursosController::class, 'index'])
    ->name('cursos.index');

Route::get('/articulos', [\App\Http\Controllers\ArticlesController::class, 'index'])
    ->name('articulos.index');

Route::get('/articulos/{id}', [\App\Http\Controllers\ArticlesController::class, 'view'])
    ->name('articles.view')
    ->whereNumber('id');

Route::get('/login', [\App\Http\Controllers\DashboardController::class, 'login'])
    ->name('login');


Route::get('/admin/dashboard', [\App\Http\Controllers\DashboardController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware(CheckRole::class);

Route::get('/admin/create', [\App\Http\Controllers\DashboardController::class, 'create'])
    ->name('create')
    ->middleware('auth');

Route::post('/admin/create', [\App\Http\Controllers\DashboardController::class, 'store'])
    ->name('store')
    ->middleware('auth');

Route::get('/admin/dashboard/{id}/eliminar', [\App\Http\Controllers\DashboardController::class, 'delete'])
    ->name('article.delete')
    ->middleware('auth');

Route::post('/admin/dashboard/{id}/destruir', [\App\Http\Controllers\DashboardController::class, 'destroy'])
    ->name('article.destroy')
    ->middleware('auth');

Route::get('/admin/dashboard/{id}/editar', [\App\Http\Controllers\DashboardController::class, 'edit'])
    ->name('article.edit')
    ->middleware('auth');

Route::post('/admin/dashboard/{id}/publicar', [\App\Http\Controllers\DashboardController::class, 'update'])
    ->name('article.update')
    ->middleware('auth');

// Route::get('iniciar-sesion', [\App\Http\Controllers\DashboardControllerController::class, 'auth'])
//     ->name('auth.auth');

Route::get('/admin', [\App\Http\Controllers\DashboardController::class, 'auth'])
    ->name('admin.auth');

Route::post('admin/dashboard', [\App\Http\Controllers\DashboardController::class, 'doLogout'])->name('admin.doLogout');


// Ruta para mostrar el perfil (GET)
Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile'])
    ->name('profile')
    ->middleware('auth');

// Ruta para actualizar el perfil (POST)
Route::post('/profile', [\App\Http\Controllers\UserController::class, 'updateProfile'])
    ->name('profile.update')
    ->middleware('auth');

Route::get('/user/cursos', [\App\Http\Controllers\CursosController::class, 'perfil'])
    ->name('user.cursos');
