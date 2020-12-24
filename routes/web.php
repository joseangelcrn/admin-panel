<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
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
        Route::get('/show/user/{id}',[AdminController::class,'showUser'])->name('admin.show-user');
        Route::post('/assign_task',[AdminController::class,'assignTask'])->name('admin.assign-task');
        Route::post('/restore_task/{id}',[AdminController::class,'restoreTask'])->name('admin.restore-task');
    });
    //Staff Routes...
    Route::prefix('staff')->group(function () {
        Route::get('/',[StaffController::class,'index'])->name('staff.index');
    });

    //Task Routes...
    Route::prefix('task')->group(function () {
        Route::get('/list-enabled',[TaskController::class,'enabledList'])->name('task.list-enabled');
        Route::get('/list-disabled',[TaskController::class,'disabledList'])->name('task.list-disabled');
    });
    Route::resource('/task', TaskController::class)->name('*','task');


});


//Permission outputs (messages)
Route::get('/forbidden',function ()
{
    return view('forbidden');
});
