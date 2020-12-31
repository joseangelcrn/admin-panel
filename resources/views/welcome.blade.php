@extends('layouts.app')

@section('content')


    <div class="container card-shadow mt-5 py-5 bg-gradient-primary rounded">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-white text-center">
                <h1 class="border-bottom">Panel de administración</h1>
            </div>
        </div>
        <div class="row text-white d-flex justify-content-center">
            <div class="col-lg-4 col-md-4">
                <p>Aplicación para la gestión de tareas.</p>
                <ul>
                    <li>Roles prediseñados:
                        <ul>
                            <li>Admin
                                <ul>
                                    <li>Permisos:
                                       <ul>
                                            <li>
                                                Tareas
                                                <ul>
                                                    <li>Crear</li>
                                                    <li>Editar</li>
                                                    <li>Completar</li>
                                                    <li>Asignar a usuarios</li>
                                                    <li>Eliminar</li>
                                                </ul>
                                            </li>
                                            <li>
                                                Usuarios
                                                <ul>
                                                    <li>Editar</li>
                                                </ul>
                                            </li>
                                       </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>Staff
                                <ul>
                                    <li>Permisos:
                                       <ul>
                                            <li>
                                                Tareas
                                                <ul>
                                                    <li>Completar</li>
                                                </ul>
                                            </li>
                                       </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-12 col-md-12">
                @auth
                <a href="
                    @role('admin')
                        {{route('admin.index')}}
                    @endrole
                    @role('staff')
                        {{route('staff.index')}}
                    @endrole
                    "
                    class="btn btn-primary w-100 pt-4" style="height: 75px;">
                            Mi Panel
                        </a>
                @endauth
            </div>
        </div>
    </div>

@endsection
