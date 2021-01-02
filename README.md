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
Route::group(['middleware' => ['auth','verify']], function () {
````
