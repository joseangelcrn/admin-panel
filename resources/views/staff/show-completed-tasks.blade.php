@extends('layouts.app')

@section('title','Staff - Mis tareas completadas')

@section('styles')
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection


@section('content')

 @section('header','Pagina Staff - Mis tareas completadas')

 <div class="container card shadow p-5">
    <div class="row">
        <div class="col-lg-12 col-md-12">
           @include('partials.datatable.admin.task',['tasks'=>$tasks])
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
                $('#dataTable-tasks').DataTable();
            });
    </script>

@endsection
