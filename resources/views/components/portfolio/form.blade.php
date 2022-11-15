@if (Session::get('permission'))
<form action="{{$action}}" method="POST" class="row p-3" enctype="multipart/form-data">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    @isset($count)
    <input type="hidden" name="ordem" value="{{$count}}">
    @endisset

    <table class="table">
        <thead>
            @if (!@isset($count))
            <th>Ordem</th>
            @endif
            <th>Título</th>
            <th>Tag</th>
            <th>Url</th>
            <th>Link da Imagem</th>
        </thead>
        <tbody>
            <tr>
                @if (!@isset($count))
                <td>
                    <label for="ordem">Ordem</label>
                    <input class="form-control" type="text" name="ordem" value="{{$data->ordem}}">
                </td>
                @endif
                <td>
                    <label for="titulo">Título</label>
                    <input class="form-control" type="text" name="titulo" id="titulo" value="{{$data->titulo ?? old('titulo')}}">
                </td>
                <td>
                    <label for="tag">Tag</label>
                    <input class="form-control" type="text" name="tag" id="tag" value="{{$data->tag ?? old('titulo')}}">
                </td>
                <td>
                    <label for="url">Url</label>
                    <input class="form-control" type="url" name="url" id="url" value="{{$data->url ?? old('titulo')}}">
                </td>
                <td>
                    <label for="image">Link Imagem</label>
                    <input class="form-control" 
                        type="file" 
                        name="imagem" 
                        id="imagem"
                        accept="image/svg+xml,image/png" 
                        value="{{$data->imagem ?? old('titulo')}}">
                </td>
            </tr>
        </tbody>
    </table>
    <div class="form-group mt-3">
        <button class="btn btn-primary">Salvar</button>
    </div>
</form>
@endif