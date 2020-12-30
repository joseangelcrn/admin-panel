<div class="row no-gutters align-items-center mt-3">
    <div class="col-auto">
        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$value}}%</div>
    </div>
    <div class="col">
        <div class="progress progress-sm mr-2">
            <div class="progress-bar bg-{{$class}}" role="progressbar"
                style="width: {{$value}}%" aria-valuenow="{{$value}}" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>
    </div>
</div>
