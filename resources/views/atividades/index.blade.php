<x-layout navbar>
    @section('hearing')
        <x-topHeader :titulo="$pageTitle"/>
    @endsection
    <div class="p-3">
        @if($atividades->count())
        <div class="p-3 row">
            @foreach ($atividades as $item)
                <div class="col-md-6 p-2">
                    <div class="row">
                        <h3 class="col-10">{{$item->nome}}</h3>
                        <img class="col-2" src="{{asset('storage/'.$item->urlIcone)}}" alt="icone">
                    </div>
                    <p class="flex-grow-1">{{$item->descricao}}</p>
                    <div class="d-flex gap-2">
                        <a href="{{route('atividades.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-rotate-right"></i></a>
                        <form action="{{route('atividades.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        @else
        <div class="p-3">
            <h2 class="text-muted text-center"><strong><i>Não há nenhuma Atividade</i></strong></h2>
        </div>
        @endif
        <x-atividades.form :action="route('atividades.store')"/>
    </div>
</x-layout>