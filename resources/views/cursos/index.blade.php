<x-layout navbar :mensagem-sucesso="$mensagemSucesso">
    @section('hearing')
        <x-topHeader :titulo="$pageTitle"/>
    @endsection
    <div class="p-3">    
        <div class="row p-1">
            <div class="col-12 border p-1">
                <table class="table">
                    <thead>
                        <th>ordem</th>
                        <th>nome</th>
                        <th>empresa</th>
                        <th>url</th>
                        <th>#</th>
                    </thead>
                    <tbody>
                        @if($cursos->count())
                        @foreach ($cursos as $item)
                        <tr>
                            <td>{{$item->ordem}}</td>
                            <td>{{$item->nome}}</td>
                            <td>{{$item->empresa}}</td>
                            <td>{{$item->url}}</td>
                            <td class="row justify-content-center gap-1">
                                <a href="{{route('cursos.edit',$item->id)}}" class="btn btn-primary col-4 btn-sm"><i class="fa-solid fa-rotate-right"></i></a>
                                <form action="{{route('cursos.destroy',$item->id)}}" class="col-4 p-0" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger w-100 btn-sm"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center">
                                <h3><strong><i>Não há dados aqui</i></strong></h3>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-cursos.form :action="route('cursos.store')" count="{{$cursos->count()+1}}"/>
</x-layout>