<?php

use App\Http\Controllers\RegisterController;
use App\Http\Middleware\CheckRole;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CursosController;


Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile'])
    ->name('profile')
    ->middleware('auth');

Route::post('/profile', [\App\Http\Controllers\UserController::class, 'updateProfile'])
    ->name('profile.update')
    ->middleware('auth');

Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])
    ->name('admin.register');

Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register'])
    ->name('register');

Route::post('/logout', [\App\Http\Controllers\RegisterController::class, 'logout'])
    ->name('logout');

Route::get('/crear-preferencia', [MercadoPagoController::class, 'crearPreferencia']);



// Rutas Nuevas:

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/login', [\App\Http\Controllers\DashboardController::class, 'login'])
    ->name('login');

Route::prefix('admin')->controller(\App\Http\Controllers\DashboardController::class)->group(function () {

    Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware(CheckRole::class);
    Route::get('/create', 'create')->name('create')->middleware('auth');
    Route::post('/create', 'store')->name('store')->middleware('auth');
    Route::get('/', 'auth')->name('admin.auth');
    Route::post('/dashboard/logout', 'doLogout')->name('admin.doLogout');

    Route::prefix('dashboard/{id}')->middleware('auth')->group(function () {
        Route::get('/eliminar', 'delete')->name('article.delete');
        Route::post('/destruir', 'destroy')->name('article.destroy');
        Route::get('/editar', 'edit')->name('article.edit');
        Route::put('/publicar', 'update')->name('article.update');
    });
});

Route::prefix('planes')->controller(SuscripcionController::class)->group(function () {

    Route::get('/', 'index')->name('suscripciones');
    Route::get('/starter', 'starter')->name('planes.starter');
    Route::get('/pro', 'pro')->name('planes.pro');
    Route::get('/senior', 'senior')->name('planes.senior');
});

Route::controller(ArticlesController::class)->group(function () {

    Route::get('/articulos', 'index')->name('articulos.index');
    Route::get('/articulos/{article}', 'view')->name('articles.view');
});

Route::prefix('cursos')->controller(CursosController::class)->group(function () {

    Route::get('/', 'index')->name('cursos.index');
    Route::get('/user', 'perfil')->name('user.cursos');
    Route::post('/{curso}/add', 'add_curso')->name('add.curso');
});
    
    //{"id":"3202141953-5f840558-b090-4ece-9552-cd4dc8408f80"}