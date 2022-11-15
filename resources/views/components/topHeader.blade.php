<div class="p-3 bg-secondary d-flex align-items-center gap-3 @isset($class){{$class}}@endisset" style="color:white;">
    @isset($back)<a class="h1" href="{{route($back)}}">
        <i class="fa-sharp fa-solid fa-arrow-left"></i>
    </a>@endisset<h1>{{$titulo}}</h1>
</div>
