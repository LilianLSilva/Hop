# Ejercicio en PHP Laravel para Andreani Hop

Se amplian las Api de SWAPI (SWAPI proporciona información sobre el universo de “Star
Wars”) para administrar el inventario de naves espaciales y vehículos agregando la propiedad count.

## Requisitos del servicio
Esta aplicación esta basada laravel ^8.75. Consulte las instrucciones de instalación de Laravel para obtener más información.

Apache 2.4, PHP 7.3, MySQL 8, Composer 2.2.6.

## Virtualhost
Para este ejemplo el virtualhost creado es http://localhost:8000

## Setup and Config

### Requirements
1. PHP
2. MySQL database
3. Composer

## Installation steps:
1. Clonar el repositorio:
```bash
git clone git@github.com:LilianLSilva/Hop.git
```
2. Una vez clonado el repositorio, necesitamos crear una base de datos Mysql (i.e. `hop`).

3. copiar el archivo .env.example en el archivo .env y edita el archivo de configuración, especialmente la configuración de Mysql.
```bash
cp .env.example .env
```
4. Ejecute con siguientes comandos.  
```bash
composer install
```
### Database migration:
5. necesitamos correr las migraciones de las nuevas tablas de `inv_vehicle` y `inv_starship`.
```bash
php artisan migrate
```

### Database seeding:

6. Database partial seeding: para popular las tablas con los datos de la APi debemos correr los siguientes comandos:
```bash
php artisan db:seed --class=StarshipSeeder 
php artisan db:seed --class=VehicleSeeder  
```

Listo. Ya podemos probar la API con Postman. 
```code
GET http://localhost:8000/api/vehicles
```
Debe retornar algo como:
```javascript
{
    {
        "data": {
        "count": 39,
            "next": "https://swapi.dev/api/vehicles/?page=2",
            "previous": null,
            "results": [...
                "count" : 2
            ]
        }
    }
}
```

## Q&A

### Doubts?
Puedes enviar un mail a silvalilian662@gmail.com

