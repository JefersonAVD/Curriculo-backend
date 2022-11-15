@if (Session::get('permission'))
<form action="{{$action}}" method="post">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif
    <div class="form-group d-flex flex-column">
        <label for="conteudo">Conteudo</label>
        <textarea name="conteudo" id="conteudo" cols="30" rows="10">@isset($titulo){{$titulo}}@endisset</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endif