
    <div class="row d-flex justify-content-between my-5">
        <div class="col-lg-12 col-md-12">
            <h3>Usuarios</h3>
            <hr>
        </div>
        <div class="col-lg-4 col-md-4 my-1">
            <div id="info" class ="card border-left-primary shadow  py-2">
                <a href="{{route('admin.show-all-users')}}">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Usuarios totales
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$info['user_total']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-info-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 my-1">
            <div id="info" class ="card border-left-success shadow  py-2">
                <a href="{{route('admin.show-verified-users')}}">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Usuarios activos
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$info['user_active']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-info-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </a>
                </div>
        </div>
        <div class="col-lg-4 col-md-4 my-1">
            <div id="info" class ="card border-left-danger shadow  py-2">
                <a href="{{route('admin.show-unverified-users')}}">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Usuarios no activos
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$info['user_not_active']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-info-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 my-1">
            <div id="info" class ="card border-left-info shadow  py-2">
                <a href="{{route('admin.show-users-with-tasks')}}">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Usuarios con tareas
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$info['user_with_tasks']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-info-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 my-1">
            <div id="info" class ="card border-left-warning shadow  py-2">
                <a href="{{route('admin.show-users-without-tasks')}}">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color: #ccaf0c">
                                    Usuarios sin tareas
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$info['user_without_tasks']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-info-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
