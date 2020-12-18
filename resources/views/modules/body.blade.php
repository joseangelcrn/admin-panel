@extends('modules.main-template')

@section('body')

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <div class="container-fluid" style="height:100vh;">
                @yield('content')
            </div>
        </div>
    </div>

@endsection
