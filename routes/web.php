<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
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
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/',[AdminController::class,'index'])->name('index');

        Route::get('/show/user/all',[AdminController::class,'showAllUsers'])->name('show-all-users');
        Route::get('/show/user/verified',[AdminController::class,'showVerifiedUsers'])->name('show-verified-users');
        Route::get('/show/user/unverified',[AdminController::class,'showUnverifiedUsers'])->name('show-unverified-users');
        Route::get('/show/user/with-tasks',[AdminController::class,'showUsersWithTasks'])->name('show-users-with-tasks');
        Route::get('/show/user/without-tasks',[AdminController::class,'showUserWithoutTasks'])->name('show-users-without-tasks');
        Route::get('/show/user/{id}',[AdminController::class,'showUser'])->name('show-user');

    });

    //Staff Routes...
    Route::prefix('staff')->name('staff.')->group(function () {
        Route::get('/',[StaffController::class,'index'])->name('index');
    });

    //Task Routes...
    Route::prefix('task')->name('task.')->group(function () {
        Route::get('/list-enabled',[TaskController::class,'enabledList'])->name('list-enabled');
        Route::get('/list-disabled',[TaskController::class,'disabledList'])->name('list-disabled');
        Route::get('/list-assigned',[TaskController::class,'assignedList'])->name('list-assigned');
        Route::get('/list-unassigned',[TaskController::class,'unassignedList'])->name('list-unassigned');
        Route::get('/list-completed-unverified',[TaskController::class,'completedAndNotVerifiedList'])->name('list-completed-unverified');
        Route::get('/list-incompleted',[TaskController::class,'incompletedList'])->name('list-incompleted');

        Route::post('/assign',[TaskController::class,'assignTask'])->name('assign');
        Route::post('/restore/{id}',[TaskController::class,'restoreTask'])->name('restore');
        Route::post('/complete/{taskId}/{userId}',[TaskController::class,'complete'])->name('complete');
    });
    Route::resource('/task', TaskController::class)->name('*','task');


});

Route::get('/test', function () {
    $incompleteTasks = Task::getIncompleteAndActive();
    dd($incompleteTasks->pluck('id'));
});

//Permission outputs (messages)
Route::get('/forbidden',function ()
{
    return view('forbidden');
})->name('forbidden');
