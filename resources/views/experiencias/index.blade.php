<x-layout navbar :mensagem-sucesso="$mensagemSucesso">
    @section('hearing')
        <x-topHeader :titulo="$pageTitle" />
    @endsection
    <div class="p-3">
        <div class="row justify-content-evenly gap-1 p-3">
            @if($experiencias->count())
            @foreach ($experiencias as $item)
                <div class="card col-md-5 flex-row">
                    <span class="btn btn-dark btn-sm align-self-start mt-3 disabled" style=""># {{$item->ordem}}</span>
                    <div class="card-body">
                        <h4 class="card-title"> {{$item->vaga}}</h4>
                        <h6 class="card-subtitle text-muted">{{$item->empresa}}</h6>
                        <span>Periodo: {{$item->inicio}} / {{$item->fim}}</span>
                        <p class="card-text">{{$item->atividades}}</p>
                        <div class="d-flex gap-2">
                            <a class="btn btn-primary btn-sm" href="{{route('experiencias.edit',$item->id)}}"><i class="fa-solid fa-rotate-right"></i></a>
                            <form action="{{route('experiencias.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <h3 class="text-center"><strong><i>Não há dados aqui</i></strong></h3>
            @endif
        </div>
        <x-experiencias.form :action="route('experiencias.store')" :count="$experiencias->count() + 1"/>
    </div>
</x-layout>