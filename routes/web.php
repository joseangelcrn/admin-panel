<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth routes need email verification to access
Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Protected routes
Route::group(['middleware' => ['auth']], function () {
    //Admin Routes..

    Route::prefix('admin')->group(function () {
        Route::get('/',[AdminController::class,'index'])->name('admin.index');
    });
    //Staff Routes...
    Route::prefix('staff')->group(function () {
        Route::get('/',[StaffController::class,'index'])->name('staff.index');
    });

    //Wathever user role can access here ..
    Route::resource('/user',UserController::class)->name('*','user');
});


//Permission outputs (messages)
Route::get('/forbidden',function ()
{
    return view('forbidden');
});
