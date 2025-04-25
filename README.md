
---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Logo de Laravel"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Estado de Construcción"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Descargas Totales"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Última Versión Estable"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="Licencia"></a>
</p>

## Documentación de refactorización de código

Este proyecto implica refactorizar la API de Laravel existente para implementar los principios de **la arquitectura limpia**. El objetivo es mejorar el mantenimiento, la escalabilidad y testabilidad de la aplicación organizando la base de código en capas distintas.

### Objetivos de la refactorización:

- **Implementar Arquitectura Limpia**: Organizar la base de código en capas que separen la lógica de negocio de las preocupaciones del marco.
- **Definir Capas**: Establecer límites claros entre entidades, casos de uso, adaptadores de interfaz y marcos.

### Documentación

- [Arquitectura límpia con Laravel (English)](https://dev.to/bdelespierre/how-to-implement-clean-architecture-with-laravel-2f2i) - Una guía práctica sobre cómo implementar Arquitectura Limpia en Laravel.
- [API RESTful de Laravel de manera Limpia (English)](https://medium.com/@dammywrites/laravel-restful-api-the-clean-way-daca8e4bd950) - Un artículo de Ibiyemi 'Damilare' que discute las mejores prácticas para construir APIs RESTful en Laravel.
- [Conoce Laravel > Conceptos de Arquitectura (English)](https://laravel.com/docs/master/) - Documentación oficial de Laravel que cubre conceptos de arquitectura.

### BUGS

Debido a el bug en el framework Laravel en la resolución de nombres al momento de hacer seed en la base de datos se tuvo que crear los siguientes archivos fuera de la arquitectura propuesta:

  - App/
  - └──Currency.php
  - └──DocumentType.php
  - └──PaymentMethod.php

Fuente: [(BUG)Factory Model Name Resolver Applies to All Factories (English)](https://github.com/laravel/framework/issues/54642) - La resolución de nombres de modelos de fábrica se aplica a todas las fábricas.


## Instrucciones de instalación:

Instrucciones para configurar y ejecutar el proyecto Laravel en tu máquina local después de descargar el repositorio.

### Prerrequisitos

Antes de comenzar, asegúrate de tener lo siguiente instalado en tu máquina:

- **PHP** (versión 7.3 o superior)
- **Composer**
- **MySQL** u otro servidor de base de datos

## Paso 1: Clonar el Repositorio

Clona el repositorio en tu máquina local usando Git:

```bash
git clone https://github.com/larry-noriega/api-laravel-backend.git
```

Navega al directorio del proyecto:

```bash
cd nombre-del-repositorio
```

## Paso 2: Instalar Dependencias

Ejecuta el siguiente comando para instalar las dependencias del proyecto usando Composer:

```bash
composer install
```

## Paso 3: Configurar el Archivo de Entorno

1. **Copia el archivo `.env.example` a `.env`:**

```bash
cp .env.example .env
```

```plaintext
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=America/Bogota
APP_URL=http://localhost
APP_PAYMENTGATEWAY=http://localhost:5173/transaction
```

2. **Genera la clave de la aplicación:**

```bash
php artisan key:generate
```

3. **Configura los ajustes de tu base de datos** en el archivo `.env`. Actualiza las siguientes líneas con tus credenciales de base de datos:

```plaintext
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

## Paso 4: Ejecutar Migraciones

Ejecuta las migraciones para crear las tablas necesarias en la base de datos:

```bash
php artisan migrate
```

## Paso 5: Sembrar la Base de Datos

Para poblar la base de datos con datos iniciales, ejecuta el siguiente comando:

```bash
php artisan db:seed
```

## Paso 6: Iniciar el Servidor de Desarrollo

Ahora puedes iniciar el servidor de desarrollo de Laravel con el siguiente comando:

```bash
php artisan serve
```

Tu aplicación correrá en `http://localhost:8000`.

## Paso 7: Acceder a la API RESTful

Puedes acceder a los endpoints de la API RESTful definidos en tu aplicación. Utiliza herramientas como Postman o cURL para interactuar con la API.


### Licencia

Este proyecto es software de código abierto licenciado bajo la [licencia MIT](https://opensource.org/licenses/MIT).

---