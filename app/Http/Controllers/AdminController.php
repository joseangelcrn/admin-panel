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
        $notAssignedTasks = Task::getNotAssignedAndActive();
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
        $task = Task::findOrFail($request->task_id);
        $wasAssigned = $user->assignTask($task->id);

        if ($wasAssigned) {
            return redirect()->back()->with('success','Se le ha asignado correctamente la tarea al usuario');
        } else {
            return redirect()->back()->with('error','Ocurrio un error al asignar la tarea al usuario');
        }
    }

    public function restoreTask($id)
    {
        $task = Task::findOrFail($id);
        $activated  = $task->activate();

        if ($activated) {
            return back()->with('success','La tarea se ha vuelto a activar correctamente.');
        } else {
            return back()->with('error','Error al volver ha activar la tarea.');
        }

    }

}
