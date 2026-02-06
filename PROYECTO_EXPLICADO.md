# 📚 Portal de Artículos y Cursos - Documentación del Proyecto

---

## 📖 Tabla de Contenidos

1. [¿Qué es este proyecto?](#que-es-este-proyecto)
2. [Arquitectura General](#arquitectura-general)
3. [Estructura de la Base de Datos](#estructura-de-la-base-de-datos)
4. [Relaciones entre Modelos](#relaciones-entre-modelos)
5. [Rutas Principales](#rutas-principales)
6. [Controladores](#controladores)
7. [Middleware](#middleware-seguridad)
8. [Estructura de Carpetas](#estructura-de-carpetas)
9. [Migraciones](#migraciones)
10. [Seeders](#seeders)
11. [Flujo de Uso Típico](#flujo-de-uso-típico)
12. [Comandos Útiles](#comandos-útiles)
13. [Modelo Eloquent](#modelo-eloquent)
14. [Vistas](#vistas-frontend)
15. [Configuración](#configuración)
16. [Troubleshooting](#troubleshooting-común)
17. [Recursos Útiles](#recursos-útiles)
18. [Próximos Pasos](#próximos-pasos)

---

## ¿Qué es este proyecto?

Este es un **portal de educación en línea** construido con **Laravel 11**. Es una plataforma donde:

- Los usuarios pueden leer **artículos organizados por niveles** (básico, intermedio, avanzado)
- Los usuarios pueden explorar **cursos disponibles**
- Los **administradores** pueden crear, editar y eliminar artículos
- Existe un sistema de **autenticación de usuarios** con roles diferentes

---

## Arquitectura General

### Stack Tecnológico

- **Backend**: Laravel 11 (Framework PHP)
- **Frontend**: Vue.js / Blade (Motor de plantillas)
- **Base de Datos**: SQL (MySQL, PostgreSQL, etc.)
- **Asset Pipeline**: Vite (compilación de CSS/JS)
- **Package Manager**: Composer (PHP), npm (JavaScript)

---

## Estructura de la Base de Datos

### Tablas Principales

#### 1. **users** - Usuarios del Sistema

```
- id: ID único del usuario
- name: Nombre del usuario
- email: Email (único para login)
- password: Contraseña encriptada
- rol: Rol del usuario (admin, usuario, etc.)
- timestamps: created_at, updated_at
```

#### 2. **articles** - Artículos del Portal

```
- id: ID único del artículo
- title: Título del artículo
- body: Contenido del artículo (texto largo)
- excerpt: Resumen corto del artículo
- img: URL/ruta de la imagen del artículo
- author: Autor del artículo
- category: Categoría del artículo
- time: Tiempo de lectura (ej: "5 min")
- nivel_fk: ID del nivel (relación con tabla nivels)
- timestamps: created_at, updated_at
```

#### 3. **nivels** - Niveles de Dificultad

```
- nivel_id: ID único
- nivel_name: Nombre del nivel (Básico, Intermedio, Avanzado)
```

#### 4. **topics** - Temas/Etiquetas

```
- topic_id: ID único
- topic_name: Nombre del tema
```

#### 5. **articles_have_topics** - Relación Muchos a Muchos

```
- article_fk: ID del artículo
- topic_fk: ID del tema
```

_Un artículo puede tener múltiples temas y un tema puede estar en múltiples artículos_

#### 6. **cursos** - Cursos Disponibles

```
- id: ID único del curso
- nombre: Nombre del curso
- descripcion: Descripción del curso
- duracion: Duración estimada
- nivel: Nivel del curso
- imagen: Imagen del curso
- timestamps: created_at, updated_at
```

#### 7. **users_have_cursos** - Relación Usuarios-Cursos

```
- user_id: ID del usuario
- curso_id: ID del curso
```

_Indica qué cursos ha tomado cada usuario_

---

## 🔗 Relaciones entre Modelos {#relaciones-entre-modelos}

```
User (Usuario)
├── tiene muchos cursos vía users_have_cursos
└── puede crear artículos (relación 1:N implícita)

Article (Artículo)
├── pertenece a un Nivel (belongsTo)
└── tiene muchos Topics vía articles_have_topics (belongsToMany)

Nivel (Nivel)
└── tiene muchos Articles (1:N)

Topic (Tema)
└── tiene muchos Articles vía articles_have_topics (N:N)

Curso (Curso)
└── tiene muchos Users vía users_have_cursos (N:N)
```

---

## 🛣️ Rutas Principales {#rutas-principales}

### Rutas Públicas (Sin autenticación)

| Método | Ruta              | Controlador         | Función                    |
| ------ | ----------------- | ------------------- | -------------------------- |
| GET    | `/`               | HomeController      | Página de inicio           |
| GET    | `/cursos`         | CursosController    | Listar todos los cursos    |
| GET    | `/articulos`      | ArticlesController  | Listar todos los artículos |
| GET    | `/articulos/{id}` | ArticlesController  | Ver un artículo específico |
| GET    | `/login`          | DashboardController | Formulario de login        |

### Rutas de Administración (Requieren autenticación)

| Método | Ruta                             | Controlador         | Función                           |
| ------ | -------------------------------- | ------------------- | --------------------------------- |
| GET    | `/admin/dashboard`               | DashboardController | Panel de administración           |
| GET    | `/admin/create`                  | DashboardController | Formulario para crear artículo    |
| POST   | `/admin/create`                  | DashboardController | Guardar nuevo artículo            |
| GET    | `/admin/dashboard/{id}/editar`   | DashboardController | Formulario para editar            |
| POST   | `/admin/dashboard/{id}/publicar` | DashboardController | Guardar cambios del artículo      |
| GET    | `/admin/dashboard/{id}/eliminar` | DashboardController | Confirmación de eliminación       |
| POST   | `/admin/dashboard/{id}/destruir` | DashboardController | Eliminar artículo permanentemente |

---

## 🎮 Controladores (Lógica de la Aplicación) {#controladores}

### 1. **HomeController**

- `index()`: Muestra la página de inicio del portal

### 2. **ArticlesController**

- `index()`: Lista todos los artículos con filtros
- `view($id)`: Muestra un artículo específico con su contenido completo

### 3. **CursosController**

- `index()`: Lista todos los cursos disponibles

### 4. **DashboardController** (Admin)

- `login()`: Muestra formulario de login
- `dashboard()`: Panel principal de admin (lista artículos)
- `create()`: Muestra formulario para crear nuevo artículo
- `store()`: Guarda el nuevo artículo en BD
- `edit($id)`: Muestra formulario para editar artículo
- `update($id)`: Guarda cambios del artículo
- `delete($id)`: Confirma eliminación
- `destroy($id)`: Elimina artículo de la BD

### 5. **LoginController**

- Maneja autenticación de usuarios

### 6. **UserController**

- Operaciones CRUD sobre usuarios

---

## 🔐 Middleware (Seguridad) {#middleware-seguridad}

### **CheckRole**

- Verifica que el usuario tenga el rol de administrador
- Se aplica a rutas del dashboard
- Redirige si no tiene permisos

### **auth**

- Verifica que el usuario esté autenticado (haya hecho login)
- Se aplica a rutas que requieren autenticación

---

## 📁 Estructura de Carpetas Importante {#estructura-de-carpetas}

```
/app
  /Http
    /Controllers        ← Controladores (lógica de negocio)
    /Middleware         ← Middleware (CheckRole, etc.)
  /Models              ← Modelos Eloquent (Article, User, Curso, etc.)
  /Providers           ← Proveedores (registran servicios)

/database
  /migrations          ← Scripts para crear/modificar tablas
  /seeders            ← Datos iniciales para la BD

/routes
  /web.php            ← Definición de todas las rutas

/resources
  /views              ← Plantillas Blade (HTML)

/public
  /articles           ← Almacena contenido de artículos (archivos .txt)
  /images             ← Imágenes del sitio
  /css                ← Estilos compilados

/config               ← Archivos de configuración
```

---

## 💾 Migraciones (Historial de Cambios BD) {#migraciones}

Las migraciones son archivos PHP que definen cómo crear/modificar tablas:

| Migración           | Descripción                           |
| ------------------- | ------------------------------------- |
| `0001_01_01_000000` | Crear tabla `users`                   |
| `2024_09_29_032355` | Crear tabla `articles`                |
| `2024_09_29_033721` | Crear tabla `courses`                 |
| `2024_10_31_214944` | Crear tabla `nivels`                  |
| `2024_11_07_215030` | Crear tabla `topics`                  |
| `2024_11_07_215132` | Crear tabla `articles_have_topics`    |
| `2024_11_10_230302` | Agregar columna `rol` a tabla `users` |
| `2024_11_11_230450` | Crear tabla `users_have_cursos`       |

**Para ejecutar todas:** `php artisan migrate`

---

## 🌱 Seeders (Datos de Prueba) {#seeders}

Los seeders populate (llenan) la BD con datos iniciales:

- **UserSeeder**: Crea usuarios de prueba
- **ArticleSeeder**: Crea artículos de ejemplo
- **CursosTableSeeder**: Crea cursos de ejemplo
- **NivelSeeder**: Crea niveles de dificultad
- **TopicSeeder**: Crea temas/etiquetas
- **UsersHaveCursosSeeder**: Asigna cursos a usuarios

**Para ejecutar:** `php artisan db:seed`

---

## 🚀 Flujo de Uso Típico {#flujo-de-uso-típico}

### 1. Usuario Normal

```
1. Entra a http://localhost:8000/
2. Navega a /articulos (ve lista de artículos)
3. Hace clic en un artículo para leer (GET /articulos/{id})
4. Navega a /cursos para ver cursos disponibles
```

### 2. Administrador

```
1. Hace login en /login
2. Accede a /admin/dashboard (ve panel admin)
3. Crea nuevo artículo: /admin/create → POST /admin/create
4. Edita artículo: /admin/dashboard/{id}/editar → POST /admin/dashboard/{id}/publicar
5. Elimina artículo: /admin/dashboard/{id}/eliminar → POST /admin/dashboard/{id}/destruir
```

---

## 🔧 Comandos Útiles de Laravel {#comandos-útiles}

```bash
# Instalar dependencias
composer install
npm install

# Configurar proyecto
cp .env.example .env
php artisan key:generate

# Base de datos
php artisan migrate              # Ejecutar todas las migraciones
php artisan migrate:rollback    # Deshacer última migración
php artisan db:seed             # Ejecutar todos los seeders

# Desarrollo
php artisan serve               # Iniciar servidor (http://localhost:8000)
npm run dev                     # Compilar assets en modo desarrollo

# Utilidades
php artisan tinker              # Consola interactiva de PHP
php artisan make:controller NombreController  # Crear controlador
php artisan make:model NombreModelo           # Crear modelo
```

---

## 📝 Modelo Eloquent (ORM) {#modelo-eloquent}

Los modelos en `/app/Models` representan las tablas de BD:

### Ejemplo: Article.php

```php
class Article extends Model {
    // Campos que se pueden asignar masivamente
    protected $fillable = ['title', 'img', 'category', 'time', 'author', 'body', 'excerpt', 'nivel_fk'];

    // Un artículo pertenece a un nivel
    public function nivel(): BelongsTo {
        return $this->belongsTo(Nivel::class, 'nivel_fk', 'nivel_id');
    }

    // Un artículo puede tener muchos temas
    public function topics() {
        return $this->belongsToMany(Topic::class, 'articles_have_topics', ...);
    }
}
```

### Consultas Comunes:

```php
// Obtener todos los artículos
$articulos = Article::all();

// Obtener un artículo por ID
$articulo = Article::find(1);

// Obtener artículos de un nivel específico
$articulos = Article::where('nivel_fk', 1)->get();

// Obtener un artículo con sus temas
$articulo = Article::with('topics')->find(1);

// Crear nuevo artículo
Article::create(['title' => 'Mi artículo', ...]);

// Actualizar artículo
$articulo->update(['title' => 'Nuevo título']);

// Eliminar artículo
$articulo->delete();
```

---

## 🎨 Vistas (Frontend) {#vistas-frontend}

Las vistas Blade están en `/resources/views`. Blade es el motor de plantillas de Laravel que mezcla HTML con PHP:

```blade
<!-- Imprimir variable -->
{{ $variable }}

<!-- Condicionales -->
@if ($usuario)
    Bienvenido {{ $usuario->name }}
@endif

<!-- Loops -->
@foreach ($articulos as $articulo)
    <h2>{{ $articulo->title }}</h2>
@endforeach
```

---

## ⚙️ Configuración {#configuración}

Archivo `.env` - Configuración del proyecto:

```env
APP_NAME=Portal
APP_ENV=local
APP_DEBUG=true

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portal_db
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=cookie
CACHE_DRIVER=file
```

---

## 🐛 Troubleshooting Común {#troubleshooting-común}

| Problema             | Solución                                                      |
| -------------------- | ------------------------------------------------------------- |
| "Table not found"    | Ejecuta `php artisan migrate`                                 |
| "No data in seeder"  | Ejecuta `php artisan db:seed`                                 |
| "Unauthorized"       | Verifica que estés logueado con `php artisan auth:permission` |
| "Assets not loading" | Ejecuta `npm run dev` en otra terminal                        |
| "Connection refused" | Verifica que .env tenga datos de BD correctos                 |

---

## 📚 Recursos Útiles {#recursos-útiles}

- [Documentación Laravel](https://laravel.com/docs)
- [Eloquent ORM](https://laravel.com/docs/eloquent)
- [Blade Templating](https://laravel.com/docs/blade)
- [Migrations](https://laravel.com/docs/migrations)
- [Routing](https://laravel.com/docs/routing)

---

## ✅ Próximos Pasos {#próximos-pasos}

1. Configura el archivo `.env` con tus datos de BD
2. Ejecuta `php artisan migrate` para crear las tablas
3. Ejecuta `php artisan db:seed` para cargar datos de ejemplo
4. Inicia el servidor con `php artisan serve`
5. Abre el navegador en `http://localhost:8000`

¡Listo! Ahora tienes todo documentado para trabajar con el proyecto. 🚀
