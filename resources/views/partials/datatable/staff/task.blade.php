<table class="table table-bordered" id="dataTable-tasks" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th class="col-4">Titulo</th>
            <th class="col-4">Descripción</th>
            <th class="col-4">Fecha asignación</th>
            <th class="col-4">Opciones</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
             <th class="col-4">Titulo</th>
             <th class="col-4">Descripcion</th>
             <th class="col-4">Fecha asignación</th>
             <th class="col-4">Opciones</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach ($tasks  as $task)
            <tr>
                <td>{{$task->title}}</td>
                <td>{{Str::limit($task->description,10,'...')}}</td>
                <td>
                    {{\Carbon\Carbon::parse($task->created_at)->format('Y-m-d')}}
                    ({{\Carbon\Carbon::parse($task->created_at)->diffForHumans(\Carbon\Carbon::now())}})
                </td>
                <td>
                     <a href="{{route('task.show',$task->id)}}" class="btn btn-sm btn-primary" title="Ver tarea"><i class="fas fa-eye"></i></a>
                     {{-- <a href="{{route('task.show',$task->id)}}" class="btn btn-sm btn-primary" title="Ver tarea"><i class="fas fa-eye"></i></a> --}}
                    <form action="{{route('task.complete',[$task->id,Auth::user()->id])}}" method="post" style="display: inline-block;">
                    @csrf
                    @method('post')
                    <button class="btn btn-sm btn-warning" title="Completar la tarea">
                        <i class="far fa-check-circle"></i>
                    </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
