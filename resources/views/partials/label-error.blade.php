@if($errors->has($key))
    <strong class="text-danger">
        {{$errors->first($key)}}
    </strong>
@endif
