<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:staff-index');
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

}
