<div class="table-responsive">
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
            @foreach ($users  as $user)
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
