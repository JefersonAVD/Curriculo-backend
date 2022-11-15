<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <title>Document</title>
</head>
<body>
    <main class="d-flex">
    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{$mensagemSucesso}}
        </div>
    @endisset
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif
    @isset($navbar)
    <div class="vh-100 sticky-top" style="width:250px">
        <x-navbar/>
    </div>
    @endisset
    <div style="width:calc(100% - 250px)">
        @yield('hearing')
        {{$slot}}
    </div>
    </main>
    <script src="{{ asset('/js/app.js')}}"></script>
</body>
</html>