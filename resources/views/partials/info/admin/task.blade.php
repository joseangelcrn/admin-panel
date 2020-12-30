<div class="row d-flex justify-content-between my-5">
    <div class="col-lg-12 col-md-12">
        <h3>Tareas</h3>
        <hr>
    </div>
    <div class="col-lg-12 col-md-12 my-1">
        @include('partials.components.info-card',[
            'title'=>reset($taskInfo)['title'],
            'desc'=>reset($taskInfo)['desc'],
            'route_name'=>reset($taskInfo)['route_name'],
            'n'=>reset($taskInfo)['n'],
            'class'=>reset($taskInfo)['class'],
            'icon'=>'fas fa-info-circle fa-2x'
        ])
    </div>
    @foreach ($taskInfo as $key=>$info)
        @if ($key != 'task_total')
            <div class="col-lg-6 col-md-6  my-1">
                 @include('partials.components.info-card',[
                    'title'=>$info['title'],
                    'desc'=>$info['desc'],
                    'route_name'=>$info['route_name'],
                    'n'=>$info['n'],
                    'n_pc'=>$info['pc'],
                    'class'=>$info['class'],
                    'icon'=>'fas fa-info-circle fa-2x'
                ])
            </div>
        @endif
    @endforeach

</div>

