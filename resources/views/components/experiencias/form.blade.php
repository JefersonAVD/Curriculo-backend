@if (Session::get('permission'))
<form action="{{$action}}" method="POST" class="row justify-content-between p-3">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    @isset($count)
    <input type="hidden" name="ordem" value="{{$count}}">
    @endisset
    @if(!@isset($count))
    <div class="form-group col-1">
        <label for="ordem">Ordem</label>
        <input class="form-control" type="text" name="ordem" value="{{$data->ordem}}">
    </div>
    @endif
    <div class="form-group col-3">
        <label for="empresa">Empresa</label>
        <input class="form-control" type="text" name="empresa" id="empresa" value="{{$data->empresa ?? old('empresa')}}">
    </div>
    <div class="form-group col-4">
        <label for="vaga">Vaga</label>
        <input class="form-control" type="text" name="vaga" id="vaga" value="{{$data->vaga ?? old('vaga')}}">
    </div>
    <div class="form-group col-2">
        <label for="inicio">Início</label>
        <input class="form-control" type="inicio" name="inicio" id="inicio" value="{{$data->inicio ?? old('inicio')}}">
    </div>
    <div class="form-group col-2">
        <label for="fim">Fim</label>
        <input class="form-control" type="text" name="fim" id="fim" value="{{$data->fim ?? old('fim')}}">
    </div>
    <div class="form-group col-12">
        <label for="atividades">Atividades</label>
        <textarea class="form-control" type="text" name="atividades" id="atividades">{{$data->atividades ?? old('atividades')}}</textarea>
    </div>
    <div class="form-group mt-3">
        <button class="btn btn-primary">Salvar</button>
    </div>
</form>
@endif