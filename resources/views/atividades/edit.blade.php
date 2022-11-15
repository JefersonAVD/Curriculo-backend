<x-layout :navbar="true">
    @section('hearing')
        <x-topHeader back titulo="{!!$pageTitle!!}"/>
    @endsection
    <div class="p-3">
        <x-quemSou.formTitulo :action="route('quemsou.update',$quemsou->id)" :titulo="$quemsou->titulo"/>
    </div>
</x-layout>