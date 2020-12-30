<div class="row d-flex justify-content-between my-5">
    <div class="col-lg-12 col-md-12">
        <h3>{{$mainTitle}}</h3>
        <hr>
    </div>
    @for ($i = 0; $i < sizeof($info); $i++)
        @if ($i == 0)
            <div class="col-lg-12 col-md-12  my-1">
        @else
            <div class="col-lg-6 col-md-6  my-1">
        @endif
            @include('partials.components.info-card',[
                'title'=>$info[$i]['title'],
                'desc'=>$info[$i]['desc'],
                'route_name'=>$info[$i]['route_name'],
                'n'=>$info[$i]['n'] ?? null,
                'n_pc'=>$info[$i]['n_pc'] ?? null,
                'class'=>$info[$i]['class'],
                'icon'=>$info[$i]['icon'] ?? null
                ])
            </div>

    @endfor

</div>
