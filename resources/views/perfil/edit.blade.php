<x-layout :navbar="true">
    @section('hearing')
        <x-topHeader back="perfil.index" titulo="{!!$pageTitle!!}"/>
    @endsection
    <div class="p-3">
        <x-perfil.form action="{{route('perfil.update',$perfil->id)}}" :tipo="$perfil->tipo" :conteudo="$perfil->conteudo"/>
    </div>
</x-layout>