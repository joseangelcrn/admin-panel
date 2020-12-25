<div class="row d-flex justify-content-between my-5">
    <div class="col-lg-12 col-md-12">
        <h3>Tareas</h3>
        <hr>
    </div>
    <div class="col-lg-4 col-md-4 my-1">
        <div class="card border-left-primary shadow  py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                             Tareas totales
                         </div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{$info['task_total']}}</div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-info-circle fa-2x"></i>
                     </div>
                 </div>
             </div>
        </div>
     </div>
     <div class="col-lg-4 col-md-4 my-1">
        <div class="card border-left-success shadow  py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                             Tareas Activas
                         </div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{$info['task_enabled']}}</div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-info-circle fa-2x"></i>
                     </div>
                 </div>
             </div>
        </div>
     </div>
     <div class="col-lg-4 col-md-4 my-1">
        <div class="card border-left-danger shadow  py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                             Tareas no activas
                         </div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{$info['task_disabled']}}</div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-info-circle fa-2x"></i>
                     </div>
                 </div>
             </div>
        </div>
     </div>
     <div class="col-lg-6 col-md-6 my-1">
        <div class="card border-left-info  shadow  py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-black text-info text-uppercase mb-1">
                             Tareas asignadas
                         </div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{$info['task_assigned']}}</div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-info-circle fa-2x"></i>
                     </div>
                 </div>
             </div>
        </div>
     </div>
     <div class="col-lg-6 col-md-6 my-1">
        <div class="card border-left-warning shadow  py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color: #ccaf0c">
                             Tareas no asignadas
                         </div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{$info['task_not_assigned']}}</div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-info-circle fa-2x"></i>
                     </div>
                 </div>
             </div>
        </div>
     </div>
</div>
