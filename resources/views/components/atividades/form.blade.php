@if (Session::get('permission'))
<form action="{{$action}}" method="post" enctype="multipart/form-data">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    <div class="row">
        <div class="form-group col-md-6">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{$data->nome ?? old('nome')}}">
        </div>
        <div class="form-group col-md-6">
            <label for="urlIcone">Adicionar Ícone</label>
            <input 
                type="file" 
                name="urlIcone" 
                id="image" 
                class="form-control"
                accept="image/svg+xml, image/png" 
                value="{{$data->urlIcone ?? old('urlIcone')}}">
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10">{{$data->descricao ?? old('descricao')}}</textarea>
        </div>
    </div>
    <button class="btn btn-primary mt-2">Salvar</button>
</form>
@endif