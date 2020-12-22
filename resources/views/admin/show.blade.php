@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2>Pagina Admin - Show User</h2>
            </div>
        </div>
    </div>

    <div class="container card shadow p-5">
        <div class="row d-flex">
            <div class="col-lg-12 col-md-12">
                <h1 class="my-5 text-center">Información del usuario</h1>
            </div>
            <hr>
            <div class="col-lg-12 col-md-12 text-left">
                <h3>Nombre usuario: {{$user->name}}</h3>
                <h3>Email: {{$user->email}}</h3>
                <h3>Usuario desde :{{$user->created_at}}</h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1 class="my-5">Tareas asignadas</h1>
                <div class="mx-0 mb-2">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-task-assign">Asignar nueva tarea</a>
                                {{-- Button --}}
            {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a> --}}
                </div>
                <table class="table table-bordered" id="dataTable-tasks" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-4">Titulo</th>
                            <th class="col-4">Descripción</th>
                            <th class="col-4">Opciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="col-4">Titulo</th>
                            <th class="col-4">Descripcion</th>
                            <th class="col-4">Opciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($user->tasks  as $task)
                            <tr>
                                <td>{{$task->title}}</td>
                                <td>{{Str::limit($task->description,10,'...')}}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary" title="Ver tarea"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>




             @include('modals.task.modal-assign-form',['userId'=>$user->id])

        </div>


    </div>



@endsection
