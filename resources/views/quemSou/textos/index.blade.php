<x-layout :navbar="true">
    @section('hearing')
        <x-topHeader back="quemsou.index" titulo="{!!$pageTitle!!}"/>
    @endsection
        <div class="row">
            @foreach($linha->texto as $texto)
            <div class="col-12">
                <p>{{$texto->conteudo}}</p>
            </div>
            <div class="col-12">
                <button class="btn btn-primary btn-sm">A</button>
                <form action="{{route('texto.destroy',['linha'=>$linha->id,'id'=>$texto->id])}}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </div>
            @endforeach
        </div>
        <div class="p-2">
            <x-quemSou.formTexto action="{{route('texto.store',$linha)}}" />
        </div>
</x-layout>