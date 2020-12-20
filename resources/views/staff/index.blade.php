@extends('layouts.app')
@section('styles')

    {{-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

@endsection


@section('content')
 <div class="container">
    <div class="row">
        <div class="col-12 mb-5">
          <h2>Pagina Staff - Index</h2>
        </div>
    </div>
 </div>

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
                   @foreach ($tasks  as $task)
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
