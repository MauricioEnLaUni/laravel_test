<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel Tests

Proyecto de prueba elaborado como práctica de Laravel.
Elaborado por Mauricio Cházaro de la Universidad Tecnológica de Aguascalientes.

Utilizando Laravel 10.10 y filament 3.0.

## Instalación

La instalación requiere los pasos comunes a una aplicación de Laravel, aunque también se requiere crear un usuario de filament y especificar que la migración 2023_10_23_072359_create_project_types.php debe correr primero:<br />
```composer install```<br />
```npm i```<br />
```php artisan migrate --path=<PATH TO 2023_10_23_072359_create_project_types.php>```<br />
```php artisan make:filament-user```<br />
```php artisan db:seed```<br />
```php artisan serve```
