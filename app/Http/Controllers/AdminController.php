<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:admin-index',['only'=>'index']);
        $this->middleware('permission:admin-showUser',['only'=>'showUser']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffUsers = User::getUsersByRoleName('staff');
        $notAssignedTasks = Task::getNotAssignedAndActive();
        $taskInfo = Task::getGlobalInfo();
        $userInfo = User::getGlobalInfo();

        return view('admin.index',compact('staffUsers','notAssignedTasks','taskInfo','userInfo'));
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.show-user',compact('user'));
    }

    public function showAllUsers()
    {
        $users = User::all();
        return view('admin.show-all-users',compact('users'));
    }

    public function showVerifiedUsers()
    {
        $users = User::getVerifiedUsers();

        return view('admin.show-verified-users',compact('users'));
    }

    public function showUnverifiedUsers()
    {
        $users = User::getUnverifiedUsers();

        return view('admin.show-unverified-users',compact('users'));
    }

    public function showUsersWithTasks()
    {
        $users = User::getUsersWithTasks();

        return view('admin.show-users-with-tasks',compact('users'));
    }

    public function showUserWithoutTasks()
    {
        $users = User::getUsersWithoutTasks();

        return view('admin.show-users-without-tasks',compact('users'));
    }

}
