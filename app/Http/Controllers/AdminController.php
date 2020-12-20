<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:admin-index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $staffUsers = User::getUsersByRoleName('staff');
        $notAssignedTasks = Task::whereDoesntHave('users')->get();
        return view('admin.index',compact('staffUsers','notAssignedTasks'));
    }


}
