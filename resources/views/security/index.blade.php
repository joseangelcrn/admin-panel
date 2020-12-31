@extends('layouts.app')

@section('title','Admin - Roles y permisos')

@section('styles')
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('content')
    @section('header','Roles y permisos')

    <div class="container card shadow p-5">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>Roles</h2>
                @include('partials.datatable.role',[
                    'roles'=>$roles
                ])
            </div>
        </div>
        <div class="my-4"></div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>Permisos</h2>
                @include('partials.datatable.permission',[
                    'permission'=>$permissions
                ])
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
                $('#dataTable-roles').DataTable();
                $('#dataTable-permissions').DataTable();
            });
    </script>

@endsection
