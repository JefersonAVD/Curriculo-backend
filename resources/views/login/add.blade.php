<x-layout>
    <section class="vh-100 vw-100 d-flex align-items-center justify-content-center">
        <form action="{{route('login.store')}}" method="post" style="width:300px;">
            @csrf
            <div class="form-group">
                <label for="nome">Empresa</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="text" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Repetir a Senha</label>
                <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            <div class="mt-3">
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </div>
        </form>
    </section>
</x-layout>