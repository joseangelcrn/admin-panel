@extends('layouts.app')

@section('content')


    <div class="container card-shadow mt-5 py-5 bg-gradient-primary text-center rounded">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-white text-center">
                <h1 class="border-bottom">Panel de administración</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, iusto eum. Magnam dolorum doloribus earum architecto! Quod,
                    labore! Eveniet incidunt asperiores molestias aperiam et! Perspiciatis, in? Mollitia qui quae odit.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @auth
                    @role('admin')
                        <a href="{{route('admin.index')}}" class="btn btn-primary text-white">
                    @endrole
                    @role('staff')
                        <a href="{{route('staff.index')}}" class="btn btn-primary text-white">
                    @endrole
                            Mi Panel
                        </a>
                @endauth
            </div>
        </div>
    </div>

@endsection
