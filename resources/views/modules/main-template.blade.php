


<div id="wrapper">

    @include('modules.menu-bar-left')

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('modules.menu-bar-top')
            <div class="container-fluid">
                @yield('body')
            </div>
        </div>
    </div>
</div>

