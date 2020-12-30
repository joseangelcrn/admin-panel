<div class="table-responsive">
    <table class="table table-bordered" id="dataTable-user" width="100%" cellspacing="0">
        <colgroup>
            <col span="1" style="width: 12%;">
            <col span="1" style="width: 12%;">
            <col span="1" style="width: 12%;">
            <col span="1" style="width: 12%;">
            <col span="1" style="width: 12%;">
            <col span="1" style="width: 12%;">
            <col span="1" style="width: 12%;">
            @if (!empty($options))
            <col span="1" style="width: 40%;">
            @endif
         </colgroup>

        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apel. 1</th>
                <th>Apel. 2</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Verificado</th>
                <th>Fecha creación</th>
                <th>Tareas</th>
                @if (!empty($options))
                <th>Opciones</th>
                @endif

            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Apel. 1</th>
                <th>Apel. 2</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Verificado</th>
                <th>Fecha creación</th>
                <th>Tareas</th>
                @if (!empty($options))
                <th>Opciones</th>
                @endif
            </tr>
        </tfoot>
        <tbody>
            @foreach ($users  as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->first_surname}}</td>
                    <td>{{$user->second_surname}}</td>
                    <td>{{$user->user_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if ($user->email_verified_at != null)
                        <b class="text-success">Si</b>
                        @else
                        <b class="text-danger">No</b>
                        @endif
                    </td>
                    <td>{{$user->created_at->format('Y-m-d')}}</td>
                    <td>
                        {{$user->tasks()->count()}}
                    </td>
                    <td >
                            @if(in_array('show',$options))
                                <a href="{{route('admin.show-user',$user->id)}}" class="btn btn-sm btn-primary" title="Ver usuario"><i class="fas fa-eye"></i></a>
                            @endif
                            @if(in_array('edit',$options))
                                <a href="{{route('admin.edit-user',$user->id)}}" class="btn btn-sm btn-info" title="Editar usuario"><i class="fas fa-pencil-alt"></i></a>
                            @endisset
                            {{-- @if(in_array('delete_restore',$options))
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
                            @endisset --}}

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
