@extends('layouts.app')

@section('title','Admin - Index')

@section('styles')
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection


@section('content')

 @section('header','Pagina Admin - Index')

 <div class="container card shadow p-5">
    <div class="row">
        <div class="col-lg-12 col-md-12">
           <h1>Usuarios Staff</h1>
            @include('partials.datatable.admin.user',['users'=>$staffUsers])
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
           <h1>Tareas sin asginar</h1>
           @include('partials.datatable.admin.task',['tasks'=>$notAssignedTasks])
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
