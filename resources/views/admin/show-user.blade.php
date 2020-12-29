@extends('layouts.app')

@section('title','Admin - Show')

@section('styles')
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('content')

    @section('header','Pagina Admin - Show User')

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
                    <a href="{{route('task.assign-form',$user->id)}}" class="btn btn-success">Asignar nueva tarea</a>
                </div>
                {{-- @include('partials.datatable.task',['tasks'=>$user->tasks]) --}}
                @include('partials.datatable.task',[
                    'tasks'=>$user->tasks,
                    'options'=>Auth::user()->getOptionsForDataTable(),
                ]);
            </div>
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
            });
    </script>

@endsection
