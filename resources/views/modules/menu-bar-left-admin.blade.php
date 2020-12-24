
<!-- Heading -->
<div class="sidebar-heading">
    admin
</div>


<li class="nav-item active">
    <a class="nav-link" href="{{route('admin.index')}}">
        <i class="fas fa-users"></i>
        <span>Usuarios</span></a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Tareas</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Submenu</h6>
            <a class="collapse-item" href="{{route('task.index')}}">Todas las tareas</a>
            <a class="collapse-item" href="{{route('task.list-enabled')}}">Tareas activas</a>
            <a class="collapse-item" href="{{route('task.list-disabled')}}">Tareas desactivadas</a>
            <a class="collapse-item" href="{{route('task.create')}}">Crear tarea</a>
        </div>
    </div>
</li>
