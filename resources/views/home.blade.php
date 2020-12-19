@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$user->name}}</h1>
            <hr>
            <h2>Usuario desde: {{$user->created_at}}</h2>
            <h2>Rol: xxx</h2>
        </div>
    </div>
 </div>
@endsection
