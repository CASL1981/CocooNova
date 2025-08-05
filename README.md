# Cocoo Nova - Proyecto Laravel 12

## Índice
1. [Propósito del Proyecto](#propósito-del-proyecto)
2. [Estructura de Archivos](#estructura-de-archivos)
3. [Propósito de los Archivos y Carpetas](#propósito-de-los-archivos-y-carpetas)
4. [Tecnologías Utilizadas](#tecnologías-utilizadas)
5. [Instrucciones de Instalación](#instrucciones-de-instalación)
    - [Backend](#backend)
    - [Frontend](#frontend)
    - [Base de Datos](#base-de-datos)

---

## Propósito del Proyecto

Cocoo Nova es una aplicación web desarrollada con Laravel 12, diseñada para servir como base robusta y escalable para sistemas administrativos, portales empresariales o cualquier solución que requiera autenticación, gestión de usuarios y paneles interactivos. El proyecto integra backend y frontend modernos, facilitando el desarrollo ágil y seguro.

---

## Estructura de Archivos

```
├── app/
│   ├── Actions/
│   ├── Http/
│   ├── Livewire/
│   ├── Models/
│   ├── Providers/
│   └── View/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── assets/
├── resources/
│   ├── css/
│   ├── js/
│   ├── lang/
│   ├── sass/
│   └── views/
├── routes/
├── storage/
├── tests/
├── artisan
├── composer.json
├── package.json
├── vite.config.js
└── README.md
```

---

## Propósito de los Archivos y Carpetas

- **app/**: Lógica principal de la aplicación (controladores, modelos, acciones, componentes Livewire, vistas).
- **bootstrap/**: Inicialización y configuración básica de Laravel.
- **config/**: Archivos de configuración de servicios, base de datos, correo, etc.
- **database/**: Migraciones, fábricas y seeders para la base de datos.
- **public/**: Archivos públicos accesibles por el navegador (index.php, assets, imágenes, JS, CSS).
- **resources/**: Archivos fuente para vistas Blade, estilos, scripts y traducciones.
- **routes/**: Definición de rutas web, API y consola.
- **storage/**: Archivos generados, logs, caché y archivos subidos.
- **tests/**: Pruebas unitarias y funcionales.
- **artisan**: CLI de Laravel para tareas y comandos.
- **composer.json**: Dependencias PHP y configuración de autoload.
- **package.json**: Dependencias JS y scripts de frontend.
- **vite.config.js**: Configuración de Vite para el frontend.
- **README.md**: Documentación del proyecto.

---

## Tecnologías Utilizadas

- **Laravel 12** (Backend PHP)
- **Livewire** (Componentes interactivos en tiempo real)
- **Blade** (Motor de plantillas)
- **Vite** (Compilador y bundler de frontend)
- **Bootstrap** (Framework CSS)
- **MySQL / SQLite** (Base de datos)
- **Composer** (Gestor de dependencias PHP)
- **NPM** (Gestor de dependencias JS)

---

## Instrucciones de Instalación

### Backend

1. Clona el repositorio:
   ```bash
   git clone https://tu-repo-url.git
   cd cocoo-nova
   ```
2. Instala dependencias PHP:
   ```bash
   composer install
   ```
3. Copia el archivo de entorno:
   ```bash
   cp .env.example .env
   ```
4. Configura las variables de entorno en `.env` (base de datos, correo, etc).
5. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```
6. Ejecuta migraciones y seeders:
   ```bash
   php artisan migrate --seed
   ```
7. Inicia el servidor de desarrollo:
   ```bash
   php artisan serve
   ```

### Frontend

1. Instala dependencias JS:
   ```bash
   npm install
   ```
2. Compila los assets:
   ```bash
   npm run dev
   ```

### Base de Datos

- Por defecto, puedes usar SQLite (archivo en `database/database.sqlite`).
- Para MySQL, configura los datos de conexión en `.env`:
  ```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=nombre_db
  DB_USERNAME=usuario
  DB_PASSWORD=contraseña
  ```
- Ejecuta migraciones y seeders como se indica en la sección Backend.

---

## Notas
- Requiere PHP >= 8.2 y Node.js >= 18.
- Para producción, compila los assets con `npm run build`.
- Revisa la documentación oficial de Laravel para personalizaciones avanzadas.

---

¡Bienvenido a Cocoo Nova! Para soporte o dudas, contacta al equipo de desarrollo.
