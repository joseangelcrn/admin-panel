@extends('layouts.app')

@section('title','Admin - Roles y permisos')

@section('styles')
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('content')
    @section('header','Roles y permisos')

    <div class="container card shadow p-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 col-md-8">
                <h2>Usuarios y sus roles</h2>
                <form action="{{route('admin.security.update-all-roles')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        @include('partials.datatable.users-and-roles',[
                            'users'=>$users,
                            'roles'=>$roles
                        ])
                    </div>
                    <div class="form-group mt-5 row d-flex justify-content-center">
                        <button class="btn btn-primary w-75">Actualizar roles</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <!-- Page level plugins -->
    <script src="{{ asset('js/datatables/jquery.dataTables.js') }}" ></script>
    <script src="{{ asset('js/datatables/dataTables.bootstrap4.js') }}" ></script>

    <script>
            // Call the dataTables jQuery plugin
            $(document).ready(function() {
                $('#dataTable-user-and-role').DataTable();

            });
    </script>

@endsection
