
<!-- Heading -->
<div class="sidebar-heading">
    admin
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin_user_menu"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-users"></i>
        <span>Usuarios</span>
    </a>
    <div id="admin_user_menu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Submenu</h6>
            <a class="collapse-item" href="{{route('admin.show-all-users')}}">Todos</a>
            <a class="collapse-item" href="{{route('admin.show-verified-users')}}">Verificados</a>
            <a class="collapse-item" href="{{route('admin.show-unverified-users')}}">No verificados</a>
            <a class="collapse-item" href="{{route('admin.show-users-with-tasks')}}">Con tareas</a>
            <a class="collapse-item" href="{{route('admin.show-users-without-tasks')}}">Sin tareas</a>
        </div>
    </div>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin_task_menu"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-tasks"></i>
        <span>Tareas</span>
    </a>
    <div id="admin_task_menu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Submenu</h6>
            <a class="collapse-item" href="{{route('task.index')}}">Todas</a>
            <a class="collapse-item" href="{{route('task.list-enabled')}}">Activas</a>
            <a class="collapse-item" href="{{route('task.list-disabled')}}">No activas</a>
            <a class="collapse-item" href="{{route('task.list-assigned')}}">Asignadas</a>
            <a class="collapse-item" href="{{route('task.list-unassigned')}}">No asignadas</a>
            <a class="collapse-item" href="{{route('task.list-completed-unverified')}}">Completas (no verificadas)</a>
            <a class="collapse-item" href="{{route('task.list-incompleted')}}">Incompletas</a>
            <hr>
            <a class="collapse-item" href="{{route('task.create')}}">Crear tarea</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin_conf_menu"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Configuración</span>
    </a>
    <div id="admin_conf_menu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">submenu</h6>
            <a class="collapse-item" href="{{route('admin.security.index')}}">Ver roles y permisos</a>
        </div>
    </div>


</li>

