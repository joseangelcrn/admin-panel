@extends('modules.main-template')

@section('body')

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <div class="container-fluid">

                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-5">
                          <h2>@yield('header')</h2>
                        </div>
                    </div>
                 </div>

                @include('partials.messages')

                @yield('content')
            </div>
        </div>
    </div>

@endsection
