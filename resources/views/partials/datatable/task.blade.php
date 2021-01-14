<div class="table-responsive">
    <table class="table table-bordered" id="dataTable-tasks" width="100%" cellspacing="0">
        <colgroup>
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 10%;">
            @if (!empty($options))
            <col span="1" style="width: 15%;">
            @endif
         </colgroup>

        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Fecha creación</th>
                <th>Estado</th>
                @if (!empty($options))
                <th>Opciones</th>
                @endif

            </tr>
        </thead>
        <tfoot>
            <tr>
                 <th>Titulo</th>
                 <th>Descripcion</th>
                 <th>Fecha creación</th>
                 <th>Estado</th>
                 @if (!empty($options))
                 <th>Opciones</th>
                 @endif
            </tr>
        </tfoot>
        <tbody>
            @foreach ($tasks  as $task)
                <tr>
                    <td>{{$task->title}}</td>
                    <td>{{Str::limit($task->description,10,'...')}}</td>
                    <td>{{$task->created_at}}</td>
                    <td>
                        @if ($task->active)
                        <b class="text-success">Activa</b>
                        @else
                        <b class="text-danger">Desactivada</b>
                        @endif
                    </td>
                    @if (!empty($options))
                    <td >
                        @if(in_array('show',$options))
                            <a href="{{route('task.show',$task->id)}}" class="btn btn-sm btn-primary" title="Ver tarea"><i class="fas fa-eye"></i></a>
                        @endif
                        @if(in_array('edit',$options))
                            <a href="{{route('task.edit',$task->id)}}" class="btn btn-sm btn-info" title="Editar tarea"><i class="fas fa-pencil-alt"></i></a>
                        @endisset
                        @if(in_array('complete',$options))
                            <form action="{{route('task.complete',[$task->id,Auth::user()->id])}}" method="post" style="display: inline-block;">
                                @csrf
                                @method('post')
                                <button class="btn btn-sm btn-warning" title="Completar la tarea">
                                    <i class="far fa-check-circle"></i>
                                </button>
                            </form>
                        @endif
                        @if(in_array('verify',$options))
                            <form
                                action="{{route('task.verify',$task->id)}}"
                                method="post" style="display:inline-block;">
                                    @csrf
                                    @method('POST')
                                    <button class="btn btn-sm btn-success" title="Verificar"><i class="far fa-check-circle"></i></button>
                            </form>
                        @endisset
                        @if(in_array('delete_restore',$options))
                            <form
                                @if ($task->active)
                                    action="{{route('task.destroy',$task->id)}}"
                                @else
                                    action="{{route('task.restore',$task->id)}}"
                                @endif

                                method="post" style="display:inline-block;">
                                    @csrf
                                    @if ($task->active)
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash"></i></button>
                                    @else
                                        @method('POST')
                                        <button class="btn btn-sm btn-danger" title="Volver a activar"><i class="fas fa-trash-restore"></i></button>
                                    @endif
                            </form>
                        @endisset

                        </td>

                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
