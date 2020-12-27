@extends('layouts.app')

@section('title','Admin - Ver tarea')

@section('styles')
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('content')

    @section('header','Ver tarea')

    <div class="container card shadow p-5">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <h1 class="mt-3">{{$task->title}}</h1>
            <p class="h5 mt-5">
                {{$task->description}}
            </p>
            <hr>
            <h3>Usuarios asignados a esta tarea</h3>
            @include('partials.datatable.admin.user',['users'=>$task->users])
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
                $('#dataTable-tasks').DataTable();
            });
    </script>

@endsection
