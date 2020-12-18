


<div id="wrapper">

    @auth
        @include('modules.menu-bar-left')
    @endauth

    <div id="content-wrapper" class="d-flex flex-column">
        @auth
            @include('modules.menu-bar-top')
        @endauth
        @guest
            @include('modules.menu-bar-guest')
        @endguest
            <div class="container-fluid">
                @yield('body')
            </div>
        @auth
            @include('modules.footer')
        @endauth
    </div>
</div>

