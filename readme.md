# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).


configurar tu IP local de tu computador ingresando
resource/views/landing/index.balde.php



#Configurando el login con tokens

Pasos en el servidor:
    -Composer update (para el paquete nuevo),
    -php artisan migrate (para las tablas del paquete nuevo),
    -php artisan passport:install,
    -Dar los permisos
        chmod 600 storage/oauth-private.key
        chmod 600 storage/oauth-public.key


Configuración de Roles y Permisos:

Sembrar para produccion:
0- php artisan migrate
1- php artisan db:seed --class=RolesTableSeeder
2- php artisan db:seed --class=PermissionsTableSeeder
//solo para proyectos de version anterior a este ecommerce que no tienen el módulo de roles y permisos.

Colocar despues de migrar

#/api/fixers/assign-super-admin/1 (asigna el rol superadmin al usuario 1)
#/api/fixers/assigner/1 (asigna todos los permisos al usuario 1)
#/api/fixers/assigner-role (asigna todos los permisos a todos los roles)


Logearse con el usuario: admin pass: admin

Para que los los demás usuarios puedan trabajar con los permisos, se debe editar y actualizar su rol en el modulo usuario.

<td><a href="/template_8/images/pdf__.pdf" target="pdf-frame">Chapter-1 Organizational</a></td>

Para que los los demás usuarios puedan trabajar con los permisos, se debe editar y actualizar su rol en el modulo usuario.

#Regla para importación
1. Para importar modo Crear Nuevos productos en la columna, el valor del SKU no debe ser igual a un SKU del sistema o se debe dejar Vacío para que el sistema lo autogenere su propio SKU manteniendo la correlatividad de registro de productos (Para productos comunes[Generación de correlativo]  y para productos con presentacione¨s[Generacion de concatenación de id + dos letras del color + la talla 1ROXXL]).
2. Para importar modo Edición de productos en la columna SKU, el valor del SKU debe exitir en el sistema.


MIGRACIONES
php artisan make:migration add_profession_to_users

NUEVAS SEMBRADORAS
en caso que no funcionen hacer composer dump-autoload

Si el proyecto ya fue desplegado y no tiene datos en las siguientes tablas, ejecutar:
php artisan db:seed --class=CouponTypesTableSeeder
php artisan db:seed --class=CurrenciesTableSeeder
php artisan db:seed --class=ExchangeRatesTableSeeder
php artisan db:seed --class=UserDocumentsTableSeeder
php artisan db:seed --class=TypePlaceTableSeeder

Para sembrar pais de chile y sus comunas
php artisan db:seed --class=RegionsChileTableSeeder
