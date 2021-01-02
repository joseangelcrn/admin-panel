<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $tasks =$user->tasks;

        return view('staff.index',compact('user','tasks'));
    }

    public function showInProgress()
    {
        $user = Auth::user();
        $tasks = $user->getInProgressTasks();

        return view('staff.show-in-progress-tasks',compact('tasks'));
    }

    public function completedTasks()
    {
        $user = Auth::user();
        $tasks = $user->getCompletedTasks();

        return view('staff.show-completed-tasks',compact('tasks'));
    }

}
