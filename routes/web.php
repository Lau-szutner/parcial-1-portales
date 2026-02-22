<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Rutas de Inicio y Pagos
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/cursos', [HomeController::class, 'cursos'])->name('cursos.index');
Route::get('/crear-preferencia', [MercadoPagoController::class, 'crearPreferencia']);

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación y Registro (Públicas)
|--------------------------------------------------------------------------
*/

Route::get('/login', [DashboardController::class, 'login'])->name('login');

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('admin.register');
    Route::post('/register', 'register')->name('register');
    Route::post('/logout', 'logout')->name('logout');
});

/*
|--------------------------------------------------------------------------
| Rutas Protegidas (Requieren Auth)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Perfil de Usuario (/profile)
    Route::prefix('profile')->controller(UserController::class)->group(function () {
        Route::get('/', 'profile')->name('profile');
        Route::post('/', 'updateProfile')->name('profile.update');
    });


    Route::prefix('student')->controller(StudentController::class)->group(function () {

        Route::get('/dashboard', 'profile')->name('student.dashboard');
        Route::post('/{curso}/add', [StudentController::class, 'add_curso'])->name('add.curso');
    });
});

/*
|--------------------------------------------------------------------------
| Administración (/admin) - FUERA del grupo auth general
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->controller(DashboardController::class)->group(function () {


    Route::get('/', 'auth')->name('admin.auth');

    // Todo lo que sigue SI requiere estar logueado
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware(CheckRole::class);
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::post('/dashboard/logout', 'doLogout')->name('admin.doLogout');

        Route::prefix('dashboard/{id}')->group(function () {
            Route::get('/eliminar', 'delete')->name('article.delete');
            Route::post('/destruir', 'destroy')->name('article.destroy');
            Route::get('/editar', 'edit')->name('article.edit');
            Route::put('/publicar', 'update')->name('article.update');
        });
    });
});

/*
|--------------------------------------------------------------------------
| Rutas de Suscripciones y Planes (/planes)
|--------------------------------------------------------------------------
*/
Route::prefix('planes')->controller(SuscripcionController::class)->group(function () {
    Route::get('/', 'index')->name('suscripciones');
    Route::get('/starter', 'starter')->name('planes.starter');
    Route::get('/pro', 'pro')->name('planes.pro');
    Route::get('/senior', 'senior')->name('planes.senior');
});

/*
|--------------------------------------------------------------------------
| Rutas de Artículos (/articulos)
|--------------------------------------------------------------------------
*/
Route::controller(ArticlesController::class)->group(function () {
    Route::get('/articulos', 'index')->name('articulos.index');
    Route::get('/articulos/{article}', 'view')->name('articles.view');
});

/*
|--------------------------------------------------------------------------
| Rutas de Cursos (/cursos)
|--------------------------------------------------------------------------
*/
// Route::controller(HomeController::class)->group(function () {
//     Route::get('/', 'cursos')->name('cursos.index');
//     // Route::get('/user', 'perfil')->name('user.cursos');
//     // Route::post('/{curso}/add', 'add_curso')->name('add.curso');
// });

// ID de seguimiento: {"id":"3202141953-5f840558-b090-4ece-9552-cd4dc8408f80"}