@if (Session::get('permission'))
<form action="{{$action}}" method="post">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    <div class="form-group">
        <label for="titulo">Titulo</label>
        <input class="form-control" type="text" name="titulo" id="titulo"
        value="{{$titulo ?? old('titulo')}}"
        >
    </div>
    <button type="submit" class="btn btn-primary mt-2">Enviar</button>
</form>
@endif