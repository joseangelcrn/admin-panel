<div class="table-responsive">
    <table class="table table-bordered" id="dataTable-permissions" width="100%" cellspacing="0">
        <colgroup>
            <col span="1" style="width: 30%;">
            <col span="1" style="width: 70%;">
         </colgroup>

        <thead>
            <tr>
                <th>Permisos</th>
                <th>Roles</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Permisos</th>
                <th>Roles</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($permissions  as $permission)
                <tr>
                    <td>{{$permission->name}}</td>
                    <td>
                        {{implode(', ',$permission->roles->pluck('name')->toArray())}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
