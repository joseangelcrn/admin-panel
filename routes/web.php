<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SecurityController;
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


//Protected routes
Route::group(['middleware' => ['auth']], function () {

    //HomeController to redirect after login.
    Route::get('/home', [HomeController::class,'home'])->name('home');

    //Admin Routes..
    Route::prefix('admin')->name('admin.')->middleware(['role:admin'])->group(function () {
        Route::get('/',[AdminController::class,'index'])->name('index');

        //show
        Route::prefix('show')->name('show-')->group(function () {
            Route::get('user/all',[AdminController::class,'showAllUsers'])->name('all-users');
            Route::get('user/verified',[AdminController::class,'showVerifiedUsers'])->name('verified-users');
            Route::get('user/unverified',[AdminController::class,'showUnverifiedUsers'])->name('unverified-users');
            Route::get('user/with-tasks',[AdminController::class,'showUsersWithTasks'])->name('users-with-tasks');
            Route::get('user/without-tasks',[AdminController::class,'showUserWithoutTasks'])->name('users-without-tasks');
            Route::get('user/{id}',[AdminController::class,'showUser'])->name('user');
        });

        //edit
        Route::prefix('edit')->name('edit-')->group(function () {
            Route::get('user/{id}',[AdminController::class,'editUser'])->name('user');
        });

        //update
        Route::prefix('update')->name('update-')->group(function () {
            Route::post('user/{id}',[AdminController::class,'updateUser'])->name('user');
        });

          //Security stuff routes..
        Route::prefix('security')->name('security.')->group(function () {
          Route::get('/', [SecurityController::class,'index'])->name('index');
          Route::get('/users-and-roles', [SecurityController::class,'showTableUsersAndRoles'])->name('show.users-and-roles');
          Route::post('/update-all-roles', [SecurityController::class,'updateAllRoles'])->name('update.users-and-roles');
        });


    });

    //Staff Routes...
    Route::prefix('staff')->name('staff.')->middleware(['role:staff|admin'])->group(function () {
        Route::get('/tasks-in-progress', [StaffController::class,'showInProgress'])->name('tasks-in-progress');
        Route::get('/tasks-completed', [StaffController::class,'completedTasks'])->name('tasks-completed');
        Route::get('/',[StaffController::class,'index'])->name('index');
    });

    //Task Routes...
    Route::prefix('task')->name('task.')->middleware(['role:admin'])->group(function () {
        Route::get('/list-enabled',[TaskController::class,'enabledList'])->name('list-enabled');
        Route::get('/list-disabled',[TaskController::class,'disabledList'])->name('list-disabled');
        Route::get('/list-assigned',[TaskController::class,'assignedList'])->name('list-assigned');
        Route::get('/list-unassigned',[TaskController::class,'unassignedList'])->name('list-unassigned');
        Route::get('/list-completed-unverified',[TaskController::class,'completedAndNotVerifiedList'])->name('list-completed-unverified');
        Route::get('/list-incompleted',[TaskController::class,'incompletedList'])->name('list-incompleted');

        Route::get('/assign-form/{userId}',[TaskController::class,'assignForm'])->name('assign-form');
        Route::post('/assign',[TaskController::class,'assignTask'])->name('assign');
        Route::post('/restore/{id}',[TaskController::class,'restoreTask'])->name('restore');
        Route::post('/complete/{taskId}/{userId}',[TaskController::class,'complete'])->name('complete');
    });
    Route::resource('/task', TaskController::class)->middleware(['role:admin'])->name('*','task');


});


//Permission outputs (messages)
Route::get('/forbidden',function ()
{
    return view('forbidden');
})->name('forbidden');
