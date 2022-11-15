@if (Session::get('permission'))
<form action="{{$action}}" method="POST" class="row p-3">
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
            <th>nome</th>
            <th>empresa</th>
            <th>Url</th>
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
                    <label for="nome">Nome</label>
                    <input class="form-control" type="text" name="nome" id="nome" value="{{$data->nome ?? old('nome')}}">
                </td>
                <td>
                    <label for="empresa">Empresa</label>
                    <input class="form-control" type="text" name="empresa" id="empresa" value="{{$data->empresa ?? old('titulo')}}">
                </td>
                <td>
                    <label for="url">Url</label>
                    <input class="form-control" type="url" name="url" id="url" value="{{$data->url ?? old('titulo')}}">
                </td>
            </tr>
        </tbody>
    </table>
    <div class="form-group mt-3">
        <button class="btn btn-primary">Salvar</button>
    </div>
</form>
@endif