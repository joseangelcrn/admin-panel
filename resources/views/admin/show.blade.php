@extends('layouts.app')

@section('styles')
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

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
                <div class="mx-0 mb-3">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-task-assign">Asignar nueva tarea</a>
                </div>
                @include('partials.datatable.admin.task',['tasks'=>$user->tasks])
            </div>
             @include('modals.task.modal-assign-form',['userId'=>$user->id])
        </div>
    </div>

@endsection

@section('js')
    <!-- Page level plugins -->
    <script src="{{ asset('js/datatables/jquery.dataTables.js') }}" ></script>
    <script src="{{ asset('js/datatables/dataTables.bootstrap4.js') }}" ></script>

    <script>
            // Call the dataTables jQuery plugin
            $(document).ready(function() {
                $('#dataTable-staff-user').DataTable();
                $('#dataTable-tasks').DataTable();
            });
    </script>

@endsection
