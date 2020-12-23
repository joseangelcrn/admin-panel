<table class="table table-bordered" id="dataTable-tasks" width="100%" cellspacing="0">
    <colgroup>
        <col span="1" style="width: 30%;">
        <col span="1" style="width: 30%;">
        <col span="1" style="width: 30%;">
        <col span="1" style="width: 10%;">
     </colgroup>

    <thead>
        <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Fecha creación</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
             <th>Titulo</th>
             <th>Descripcion</th>
             <th>Fecha creación</th>
             <th>Opciones</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach ($tasks  as $task)
            <tr>
                <td>{{$task->title}}</td>
                <td>{{Str::limit($task->description,10,'...')}}</td>
                <td>{{$task->created_at}}</td>
                <td class="text-center">
                     <a href="{{route('task.show',$task->id)}}" class="btn btn-sm btn-primary" title="Ver tarea"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
