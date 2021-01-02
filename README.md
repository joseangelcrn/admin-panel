Panel de administración para la gestion y administracion de usuarios y tareas. 


<img src="https://i.gyazo.com/fffc1bb053e21aff8fc51517e94243ca.png" alt="Image from Gyazo" width="700"/>


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
