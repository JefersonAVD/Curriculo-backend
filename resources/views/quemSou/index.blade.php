<x-layout :mensagem-sucesso="$mensagemSucesso" :navbar="true">
    @section('hearing')
    <x-topHeader  titulo="{!!$pageTitle!!}"/>
    @endsection
    <div class="p-3">
        <div class="row">
            @if($info->count())
            @foreach ($info as $item)
                <a href="{{route('texto.index', $item->id)}}" class="col-11 py-2">
                    <h2>{{$item->titulo}}</h2>
                    @foreach ($item->texto as $texto)
                        <p>{{$texto->conteudo}}</p>
                    @endforeach
                </a>
                <div class="col-1 d-flex flex-column">
                    <a class="btn btn-primary" href={{route('quemsou.edit',$item->id)}}>Atualizar</a>
                    <form action="{{route('quemsou.destroy',$item->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger w-100">Excluir</button>
                    </form>
                </div>
            @endforeach
            @else
            <h3 class="text-center"><strong><i>Não há dados aqui</i></strong></h3>
            @endif
        </div>
        <x-quemSou.formTitulo :action="route('quemsou.store')"/>
    </div>
</x-layout>