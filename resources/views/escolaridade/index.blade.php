<x-layout navbar :mensagem-sucesso="$mensagemSucesso">
    <x-topHeader :titulo="$pageTitle"/>
    <div class="p-3">
        <div class="row">
            @if($escolaridade->count())
            @foreach ($escolaridade as $item)
                <div class="col-12 p-2 mb-2 border">
                    <h2>{{$item->curso}}</h2>
                    <h4>{{$item->instituicao}}</h4>
                    <span>Ano de conclusão: {{$item->anoFormacao}}</span>
                    <p class="bg-black p-1" style="color:white">{{$item->descricao}}</p>
                    <div class="d-flex gap-2">
                        <a href="{{route('escolaridade.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-rotate-right"></i></a>
                        <form action="{{route('escolaridade.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
            @else
                <h3 class="text-center"><strong><i>Não há dados aqui</i></strong></h3>
            @endif
        </div>
    </div>
    <x-escolaridade.form :action="route('escolaridade.store')"/>
</x-layout>