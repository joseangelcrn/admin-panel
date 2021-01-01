@extends('layouts.app')

@section('title','Staff - Index')

@section('styles')
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection


@section('content')

 @section('header','Pagina Staff - Index')

 <div class="container card shadow p-5">
     <div class="row d-flex justify-content-center">
         <div class="col-lg-12 col-md-12">
            <h1 class="my-5">Información personal</h1>
         </div>
         <hr>
         <div class="col-lg-5 col-md-12 d-flex justify-content-between">
            <h3>{{$user->name}}</h3>
            <h3>{{$user->email}}</h3>
         </div>
     </div>
     <hr>
    <div class="row">
        <div class="col-lg-12 col-md-12">
           <h1 class="my-5">Tareas asignadas</h1>
           @include('partials.datatable.task',[
                'tasks'=>$tasks,
                'options'=>Auth::user()->getOptionsForDataTable(true),
            ])
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
