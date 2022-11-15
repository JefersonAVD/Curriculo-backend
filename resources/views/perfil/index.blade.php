<x-layout :mensagem-sucesso="$mensagemSucesso " :navbar="true">
    @section('hearing')
    <x-topHeader  titulo="{{$pageTitle}}"/>
    @endsection
    <div class="p-3">
        <div>
            @if($info->count())    
            @foreach ($info as $item)
            <div class="row p-1">
                <div class="col-11 border p-1">
                    <h2>{{$item->tipo}}</h2>
                    <p>{{$item->conteudo}}</p>
                </div>
                <div class="col-1 d-flex flex-column gap-1 p-1">
                    <a href="{{route('perfil.edit',$item->id)}}" class="btn btn-primary">Alterar</a>
                    <form action="{{route('perfil.destroy',$item->id)}}" class="d-flex" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-100">Excluir</button>
                    </form>
                </div> 
            </div>
            @endforeach
            @else
            <h3 class="text-center"><strong><i>Não há dados aqui</i></strong></h3>
            @endif
        </div>
        <x-perfil.form :action="route('perfil.store')"/>
    </div>
</x-layout>