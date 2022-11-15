@if (Session::get('permission'))
<form action="{{$action}}" method="post">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    <div class="form-group">
        <label for="tipo">Tipo</label>
        <input class="form-control" type="text" name="tipo" id="tipo" 
            value="{{$tipo ?? old('tipo')}}"
        >
    </div>
    <div class="form-group">
        <label for="conteudo">Conteúdo</label>
        <textarea class="form-control" name="conteudo" id="conteudo" cols="30" rows="10"  
        >{{$conteudo ?? old('conteudo')}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endif