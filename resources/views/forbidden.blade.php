@extends('layouts.not-verified')

@section('content')
 <div class="container card shadow p-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-5 text-center">
            <h1>No tienes permisos para acceder a este sitio </h1>
            <p class="mt-3">
                <i class="fas fa-shield-alt fa-10x"></i>
            </p>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4 col-md-4">
            <a href="{{route('home')}}" class="btn btn-primary w-100" title="Ir a mi pagina de inicio">
                <i class="fas fa-home fa-2x"></i>
            </a>
        </div>
    </div>
 </div>
@endsection
