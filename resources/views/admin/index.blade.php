@extends('layouts.app')
@section('styles')

    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

@endsection


@section('content')
 <div class="container">
    <div class="row">
        <div class="col-12 mb-5">
          <h2>Pagina Admin - Index</h2>
        </div>
    </div>
 </div>

 <div class="container card shadow p-5">
    <div class="row">
        <div class="col-lg-12 col-md-12">
           <h1>Usuarios Staff</h1>
           <table class="table table-bordered" id="dataTable-staff-user" width="100%" cellspacing="0">
               <thead>
                   <tr>
                       <th class="col-4">Nombre</th>
                       <th class="col-4">Email</th>
                       <th class="col-1">Tareas</th>
                       <th class="col-3">Opciones</th>
                   </tr>
               </thead>
               <tfoot>
                   <tr>
                       <th>Nombre</th>
                       <th>Email</th>
                       <th>Num. Tareas</th>
                       <th>Opciones</th>
                   </tr>
               </tfoot>
               <tbody>
                   @foreach ($staffUsers  as $user)
                       <tr>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td>{{$user->tasks->count()}}</td>
                           <td>
                               <a href="{{route('admin.show-user',$user->id)}}" class="btn btn-sm btn-primary" title="Ver usuario"><i class="fas fa-eye"></i></a>
                           </td>
                       </tr>
                   @endforeach
               </tbody>
           </table>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
           <h1>Tareas sin asginar</h1>
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
                   @foreach ($notAssignedTasks  as $task)
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
                $('#dataTable-staff-user').DataTable();
                $('#dataTable-tasks').DataTable();
            });
    </script>

@endsection
