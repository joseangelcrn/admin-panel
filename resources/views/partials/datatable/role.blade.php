<div class="table-responsive">
    <table class="table table-bordered" id="dataTable-roles" width="100%" cellspacing="0">
        <colgroup>
            <col span="1" style="width: 100%;">
         </colgroup>

        <thead>
            <tr>
                <th>Roles</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Roles</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($roles  as $role)
                <tr>
                    <td>{{$role->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
