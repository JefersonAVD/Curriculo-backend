<x-layout :navbar="true">
    @section('hearing')
        <x-topHeader back="cursos.index" titulo="{!! $pageTitle !!}"/>
    @endsection
    <div class="p-3">
        <x-cursos.form :action="route('cursos.update',$curso->id)" :data="$curso"/>
    </div>
</x-layout>