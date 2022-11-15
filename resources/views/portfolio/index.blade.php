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
                        <th>titulo</th>
                        <th>tag</th>
                        <th>url</th>
                        <th>Link imagem</th>
                        <th>#</th>
                    </thead>
                    <tbody>
                        @if($portfolios->count())
                        @foreach ($portfolios as $item)
                        <tr>
                            <td><p>{{$item->ordem}}</p></td>
                            <td><p>{{$item->titulo}}</p></td>
                            <td><p>{{$item->tag}}</p></td>
                            <td><p>{{$item->url}}</p></td>
                            <td class="text-center"><img width="50" src="{{asset('storage/'.$item->imagem)}}" alt=""></td>
                            <td class="text-center">
                                <a href="{{route('portfolio.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-rotate-right"></i></a>
                                <form action="{{route('portfolio.destroy',$item->id)}}" class="p-0" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">
                                <h3 class="text-center"><strong><i>Não há dados aqui</i></strong></h3>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-portfolio.form :action="route('portfolio.store')" count="{{$portfolios->count()+1}}"/>
</x-layout>