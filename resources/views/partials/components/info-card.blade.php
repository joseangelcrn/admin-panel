<div id="info" class="card border-left-{{$class}} shadow py-2"
    title="{{$desc}}">
    <a href="{{$route_name ?? '#'}}">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-{{$class}} text-uppercase mb-1">
                        {{$title}}
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $n }}</div>
                    @isset($n_pc)
                        @include('partials.components.progress-bar',[
                            'value'=>$n_pc,
                            'class'=>$class
                        ])
                    @endisset
                </div>
                <div class="col-auto">
                    {{-- <i class="fas fa-info-circle fa-2x"></i> --}}
                    <i class="{{$icon}}"></i>
                </div>
            </div>
        </div>
    </a>
</div>
