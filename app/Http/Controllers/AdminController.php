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
        $notAssignedTasks = Task::getNotAssigned();
        return view('admin.index',compact('staffUsers','notAssignedTasks'));
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.show',compact('user'));
    }


    public function assignTask(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->assignTask($request->taskId);

        return back();

    }

}
