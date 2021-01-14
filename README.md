Panel de administración para la gestion y administracion de usuarios y tareas. 


<p align="center">
    <img src="https://i.gyazo.com/fffc1bb053e21aff8fc51517e94243ca.png" alt="Image from Gyazo" width="700"/>
</p>

## Ejecutar las migraciones y seeders

### Ejecutar migraciones

````
    php artisan migrate
````

### Ejecutar seeders

````
    php artisan db:seed
````

### Reiniciar migraciones y seeders

````
    php artisan migrate:refresh --seed
````


## Activar verificacion por email al crear usuarios: 

En web.php: 

````
//Protected routes
Route::group(['middleware' => ['auth']], function () {
````
Cambiar por..

````
//Protected routes
Route::group(['middleware' => ['auth','verified']], function () {
````

Configurar el fichero .env para el uso del servicio de email (ejemplo usando mailtrap.io) :

````
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=tu_user_name
MAIL_PASSWORD=tu_password
MAIL_ENCRYPTION=tls
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=tu_email
MAIL_FROM_NAME="${APP_NAME}"
````

## Ejecutar los tests existentes

````
    php artisan test
````

## Estados de las tareas

````
+ Total: Todas las tareas existentes.

+ Activas: Tareas con el campo active = true.

+ Inactivas: Tareas con el campo active = false.

+ Asignadas: Tareas con al menos un usuario asignado.

+ No asignadas: Tareas sin usuarios asignados.

+ Completas (no verificadas):  Tareas las cuales todos los usuarios han finalizado su parte de la tarea, pero aun no ha sido verificado por un usuario admin.

+ Incompletas: Tareas las cuales, al menos usuario asignado a la misma, no ha terminado su parte del trabajo.

+ Verificadas: Tareas las cuales las tareas han sido completadas y verificadas por un usuario administrador.
````
