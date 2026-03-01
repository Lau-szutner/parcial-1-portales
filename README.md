# Proyecto Laravel de Cursos y Artículos

Este repositorio contiene una aplicación Laravel personalizada para administrar artículos, cursos, niveles y suscripciones. A continuación se describe cómo inicializar y ejecutar el proyecto completo en tu máquina local.

---

## Requisitos previos 🛠

Antes de comenzar, asegúrate de tener instalados en tu sistema:

1. **PHP 8.1+** (o la versión requerida por la aplicación)
2. **Composer**
3. **Node.js y npm** (o yarn)
4. **MySQL** (o cualquier otra base de datos soportada, configurada en `.env`)

---

## Clonar el repositorio 📥

```bash
git clone https://github.com/Lau-szutner/Clauty
cd Clauty
```

---

## Instalación de dependencias 🔧

### PHP

```bash
composer install
```

### NPM / Vite

```bash
npm install
# o yarn install
```

---

## Configuración del entorno ⚙

Copia el archivo de ejemplo y genera la clave de la aplicación:

```bash
cp .env.example .env
php artisan key:generate
```

Edita `.env` según tu entorno (base de datos, mail, etc.).

---

## Base de datos y migraciones 🗄

Crea la base de datos (nombre según `.env`) y ejecuta las migraciones junto con los seeders:

```bash
php artisan migrate --seed
```

Los seeders poblarán tablas como usuarios, artículos y cursos.

---

## Construir activos y ejecutar Vite ⚡

Para compilar estilos y scripts ejecuta:

```bash
npm run dev      # desarrollo
npm run build    # producción
```

Vite está configurado en `vite.config.js` y genera los recursos en `public/`.

---

## Iniciar el servidor de desarrollo 🚀

```bash
php artisan serve
```

El proyecto estará disponible en `http://127.0.0.1:8000`.

También puedes usar Sail, Docker o tu propia configuración de servidor si prefieres.

---

## Ejecución de pruebas ✅

La suite de pruebas se encuentra en `tests/`.

```bash
php artisan test
# o
./vendor/bin/phpunit
```

---

## Uso y rutas principales 🔍

- `GET /` – Página de inicio con lista de artículos y cursos.
- Rutas de autenticación generadas por `Auth`.
- Recursos: `articles`, `cursos`, `nivels`, `subscriptions`.

Consulta `routes/web.php` para más detalles.

---

## Contribuir 🤝

1. Fork del repositorio.
2. Crea una rama (`git checkout -b feature/nombre`).
3. Haz tus cambios y commitea.
4. Envía un Pull Request.

---

## Licencia 📄

Este proyecto está bajo la licencia **MIT**.

---

¡Listo! Con estos pasos deberías poder iniciar y trabajar con toda la aplicación.
