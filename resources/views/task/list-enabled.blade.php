@extends('layouts.app')

@section('title','Admin - Listar tareas activas')

@section('styles')
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('content')

    @section('header','Pagina Admin - Listar  tareas activas')

    <div class="container card shadow p-5">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1 class="my-5">Todas las tareas</h1>
                <div class="mx-0 mb-3">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-task-assign">Asignar nueva tarea</a>
                </div>
                @include('partials.datatable.admin.task',['tasks'=>$tasks])
            </div>
             @include('modals.task.modal-assign-form')
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
