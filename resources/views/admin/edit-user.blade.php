@extends('layouts.app')

@section('title','Admin - Editar usuario')

@section('styles')
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection


@section('content')

 @section('header','Pagina Admin - Editar usuario')

<div class="container card shadow p-5">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h1>Editar usuario</h1>
            <form action="{{route('admin.update-user',$user->id)}}" method="post">
                @csrf
                @method('POST')

                <div class="form-group mt-4">
                    <label>Nombre:</label>
                    <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{old('name',$user->name)}}">

                    @if($errors->has('name'))
                        <strong class="text-danger">
                            {{$errors->first('name')}}
                        </strong>
                    @endif

                </div>

                <div class="form-group mt-4">
                    <label>Primer apellido:</label>
                    <input type="text" class="form-control" name="first_surname" placeholder="Primer apellido" value="{{old('first_surname',$user->first_surname)}}">

                    @if($errors->has('first_surname'))
                        <strong class="text-danger">
                            {{$errors->first('first_surname')}}
                        </strong>
                    @endif

                </div>

                <div class="form-group mt-4">
                    <label>Segundo apellido:</label>
                    <input type="text" class="form-control" name="second_surname" placeholder="Segundo apellido" value="{{old('second_surname',$user->second_surname)}}">

                    @if($errors->has('second_surname'))
                        <strong class="text-danger">
                            {{$errors->first('second_surname')}}
                        </strong>
                    @endif

                </div>

                <div class="form-group mt-4">
                    <label>Usuario:</label>
                    <input type="text" class="form-control" name="user_name" placeholder="Usuario" value="{{old('user_name',$user->user_name)}}">

                    @if($errors->has('user_name'))
                        <strong class="text-danger">
                            {{$errors->first('user_name')}}
                        </strong>
                    @endif

                </div>

                <div class="form-group mt-4">
                    <label>Email:</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{old('email',$user->email)}}">

                    @if($errors->has('email'))
                        <strong class="text-danger">
                            {{$errors->first('email')}}
                        </strong>
                    @endif

                </div>

                <div class="form-group mt-4">
                    <label>Rol:</label>
                    <select class="form-control" name="role_id" id=""  >
                        <option value="">-- Selecciona un rol --</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}"
                                @if ($user->roles->first()->id == $role->id)
                                    selected
                                @endif
                                >{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-5">
                    <button class="btn btn-primary" type="submit">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>

    </script>

@endsection
