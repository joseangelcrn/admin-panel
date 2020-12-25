
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
            <a class="collapse-item" href="{{route('task.index')}}">Todos</a>
            <a class="collapse-item" href="{{route('task.list-enabled')}}">Activos</a>
            <a class="collapse-item" href="{{route('task.list-disabled')}}">No activos</a>
            <a class="collapse-item" href="{{route('task.create')}}">Con tareas</a>
            <a class="collapse-item" href="{{route('task.create')}}">Sin tareas</a>
        </div>
    </div>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin_task_menu"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Tareas</span>
    </a>
    <div id="admin_task_menu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Submenu</h6>
            <a class="collapse-item" href="{{route('task.index')}}">Todas</a>
            <a class="collapse-item" href="{{route('task.list-enabled')}}">Activas</a>
            <a class="collapse-item" href="{{route('task.list-disabled')}}">No activas</a>
            <a class="collapse-item" href="{{route('task.list-disabled')}}">Asignadas</a>
            <a class="collapse-item" href="{{route('task.list-disabled')}}">No asignadas</a>
            <a class="collapse-item" href="{{route('task.create')}}">Crear tarea</a>
        </div>
    </div>
</li>
