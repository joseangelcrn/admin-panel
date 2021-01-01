<div class="table-responsive">
    <table class="table table-bordered" id="dataTable-user-and-role" width="100%" cellspacing="0">
        <colgroup>
            <col span="1" style="width: 12%;">
            <col span="1" style="width: 12%;">
            <col span="1" style="width: 0%;">
         </colgroup>

        <thead>
            <tr>
                <th style="display: none;">id</th>
                <th>Email</th>
                <th>Rol actual</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th style="display: none;">id</th>
                <th>Email</th>
                <th>Rol actual</th>
                <th>Actualizar</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($users  as $user)
                <tr>
                    <td style="display: none;"><input type="text" name="user_id[]"  value="{{$user->id}}"></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->roles()->first()->name}}</td>
                    <td data-search="{{$user->roles()->first()->name}}">
                        <select name="role_id[]" class="form-control">
                            <option value="">Seleccionar</option>
                            @foreach ($roles as $role)
                                <option  value="{{$role->id}}"
                                    @if ($user->roles()->first()->id === $role->id)
                                        selected
                                    @endif

                                    >{{$role->name}}</option>
                            @endforeach
                        </select>
                        <label style="display: none;">{{$user->roles()->first()->name}}</label>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
