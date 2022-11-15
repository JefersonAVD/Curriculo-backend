@if (Session::get('permission'))
<div class="p-3">
<form action="{{$action}}" method="post">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    <div class="row">
        <div class="form-group col-md-4">
            <label for="curso">Curso</label>
            <input type="text" name="curso" id="curso" class="form-control"
            value="{{ $data->curso ?? old('curso')}}"
            >
        </div>
        <div class="form-group col-md-4">
            <label for="anoFormacao">Ano de Formação</label>
            <input type="number" name="anoFormacao" id="anoFormacao" class="form-control"
            value="{{ $data->anoFormacao ?? old('anoFormacao')}}"
            >
        </div>
        <div class="form-group col-md-4">
            <label for="instituicao">Instituição</label>
            <input type="text" name="instituicao" id="instituicao" class="form-control"
            value="{{ $data->instituicao ?? old('instituicao')}}"
            >
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descrcao" cols="30" rows="10">{{ $data->descricao ?? old('decricao')}}</textarea>
        </div>
    </div>
    <button class="btn btn-primary mt-3">Salvar</button>
</form>
</div>
@endif