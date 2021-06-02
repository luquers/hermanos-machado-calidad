# 10CodeTemplate

Plantilla base para nuevos proyectos con Laravel.

## Comenzando 🚀

Este README guía al desarrollador paso a paso para desplegar la plantilla en entorno local.

### Pre-requisitos 📋

Qué se necesita para poner en funcionamiento la plantilla:

```
PHP 7.3.23
Node.js
NPM o Yarn
Git
```

### Instalación 🔧

Clonamos el proyecto a través de Git.

Ejecutamos composer install para la incorporación de dependencias.

```php
php composer.phar install
```
Añadimos el .env para configurar nuestro entorno de desarrollo.

Ejecutamos el comando artisan para generar una clave única:

```php
php artisan key:generate
```

Ejecutamos el comando artisan migrate para añadir las tablas a nuestra base de datos. Añadimos la opción --seed
para añadir al administrador y a 200 usuarios como base. Si no queremos añadir a los 200 usuarios podemos modificar el seeder. 

```php
php artisan migrate --seed
```

Ejecutamos NPM o Yarn para instalar las dependencias de javascript. 

*Recomendamos Yarn por ser más rápido en las gestiones.

```
npm install
```
o
```
yarn install
```

Para compilar los archivos javascript y css ejecutaremos el siguiente comando:

```
npm run dev
```
o
```
yarn run dev
```


## Ejecutando las pruebas ⚙️

La plantilla incluye un entorno de testing para ejecutar Unit Tests y Feature Tests. Para activar este entorno debemos
ejecutar el siguiente comando:

```php
php artisan config:cache --env=testing
```

Para volver al entorno local de desarrollo ejecutaremos el siguiente comando:
```php
php artisan config:cache --env
```

## Despliegue 📦

La plantilla incluye la librería [deployer](https://deployer.org/) que, mediante el archivo de configuración deploy.php,
es capaz de automatizar el despliegue en los entornos de preproducción y producción.

Una vez configurado el deploy.php con las especificaciones particulares del proyecto y creado el hosting correspondiente, podemos desplegar la aplicación con los siguientes
comandos:

Preproducción:

```php
php deployer.phar deployPreproduccion preproduccion 
```

Producción:

```php
php deployer.phar deployProduccion produccion 
```

## Construido con 🛠️

* [Vuexy](https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/landing/) - Plantilla madre.
* [Laravel](https://laravel.com/docs/7.x/releases) - Laravel 7.
* [Node.js](https://nodejs.org/es/) - Usado para compilar scss y js

## Contribuyendo 🖇️

El equipo de 10Code ❤️

## Wiki 📖

Para ampliar conocimientos sobre la plantilla y otras integraciones consulta el
drive de 10Code [Documentación](https://drive.google.com/drive/folders/1evrF9cpzUDVP6VrBil_3q-NC_YVfDsCb)

## Versiones 📌

Consultar el apartado changelog.



---
