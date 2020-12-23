@extends('layouts.app')

@section('title','Admin - Crear tarea')

@section('styles')
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('content')

    @section('header','Pagina Admin - Create tarea')

    <div class="container card shadow p-5">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <h1>Crear tarea</h1>
            <form action="{{route('task.store')}}" method="post">
                @csrf
                @method('post')

                {{-- Task Crud --}}
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Titulo de la tarea">
                </div>
                <div class="form-group">
                    <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Descripcion de la tarea"></textarea>
                </div>
                {{-- User assign --}}
                <hr>
                <div class="form-group row d-flex justify-content-center">
                    <div class="col-3">
                        <select id="user-selector" class="form-control">
                            <option value="">-- Seleccione un usuario -- </option>

                            @foreach ($users as $user)
                                <option value="{{$user->id}}" data-name="{{$user->name}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-sm btn-success" id="btn_assign_user" type="button">Asignar usuario</button>
                    </div>
                </div>
                {{-- assigned users --}}
                <div class="form-group">
                    <ul class="list-group" id="assigned_users_list">
                        <li class="list-group-item list-group-item-success  d-flex justify-content-between">This is a success list group item <button  class="btn btn-sm btn-danger">x</button></li>
                      </ul>
                </div>
                <div class="form-group">
                  <button class="btn btn-success" type="submit">
                      Crear tarea
                  </button>
                </div>
            </form>
          </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        var user_selector = $('#user-selector');
        var assigned_users_list = $('#assigned_users_list');
        var btn_assign_user = $('#btn_assign_user');


        function assignUser() {
            let user_id = user_selector.val();
            let user_name = user_selector.find(':selected').data("name");

            //creating li element and assign to parent
            let li = $(`<li class="list-group-item list-group-item-success d-flex justify-content-between">
                            ${user_name}
                            <input type="text" style="display:none;" name="user_id[]" value='${user_id}'>
                            <button  class="btn btn-sm btn-danger" type="button" onclick="deleteAssignedUser(${user_id})"><i class="fas fa-trash-alt"></i></button>
                       </li>`);
            li.appendTo(assigned_users_list);

            //delete current user to user selector
            user_selector.find(':selected').remove();
        }

        function deleteAssignedUser(user_id) {
            console.log('delete user with id = '+user_id);
            let li_from_assigned_users = assigned_users_list.find(`li input[name=]`);

            console.log(li_from_assigned_users);
        }



        btn_assign_user.click(function() {
            assignUser();
        });
    </script>
@endsection

