


<div id="wrapper">

    @include('modules.menu-bar-left')

    <div id="content-wrapper" class="d-flex flex-column">
            @include('modules.menu-bar-top')
            <div class="container-fluid">
                @yield('body')
            </div>
            @include('modules.footer')
    </div>
</div>

