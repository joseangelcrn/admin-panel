@extends('modules.main-template')

@section('body')

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            @yield('content')
        </div>
        @include('modules.footer')
    </div>

@endsection
