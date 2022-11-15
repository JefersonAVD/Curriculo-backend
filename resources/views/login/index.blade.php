<x-layout>
    <section class="vh-100 vw-100 d-flex flex-column align-items-center justify-content-center">
        <form action="{{route('login.enter')}}" method="post" style="width:300px;">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="text" name="password" id="password" class="form-control">
            </div>
            <div class="mt-3">
                <input type="submit" value="Logar" class="btn btn-primary btn-sm">
                <a href="{{route('login.add')}}" class="btn btn-secondary btn-sm">Cadastrar</a>
                <a href="{{route('login.guest')}}" class="btn btn-success btn-sm">Entrar como Visitante</a>
            </div>
        </form>
    </section>
</x-layout>