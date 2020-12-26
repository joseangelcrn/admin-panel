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
                     <a href="{{route('task.show',$task->id)}}" class="btn btn-sm btn-primary" title="Ver tarea"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
