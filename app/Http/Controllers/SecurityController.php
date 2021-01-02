<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SecurityController extends Controller
{


    public function __construct() {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('security.index',compact('roles','permissions'));
    }

    public function showTableUsersAndRoles()
    {
        $users = User::all();
        $roles = Role::all();

        return view('security.show-users-and-roles',compact('users','roles'));
    }

    public function updateAllRoles(Request $request)
    {
        $usersId = $request->user_id;
        $rolesId = $request->role_id;

        $success = User::assignRolesToUsers($usersId,$rolesId);

        if ($success) {
            return redirect()->back()->with('success','Todos los roles se han actualizado correctamente');
        }
        else{
            return redirect()->back()->with('error','Error al actualizar los roles');
        }
    }
}
