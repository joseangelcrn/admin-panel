<div id="info" class="card border-left-{{$class}} shadow py-2"
    title="{{$desc}}">
    <a href="{{route($route_name) ?? '#'}}">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-{{$class}} text-uppercase mb-1">
                        {{$title}}
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $n }}</div>
                    @if($n_pc != null or $n_pc > -1)
                        @include('partials.components.progress-bar',[
                            'value'=>$n_pc,
                            'class'=>$class
                        ])
                    @endisset
                </div>
                <div class="col-auto">
                    @if ($icon!=null)
                        <i class="{{$icon}}"></i>
                    @else
                        <i class="fas fa-info-circle fa-2x"></i>
                    @endif
                </div>
            </div>
        </div>
    </a>
</div>
