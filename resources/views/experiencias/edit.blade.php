<x-layout :navbar="true">
    @section('hearing')
        <x-topHeader back="experiencias.index" titulo="{!!$pageTitle!!}"/>
    @endsection
    <div class="p-3">
        <x-experiencias.form :action="route('experiencias.update',$experiencia->id)" :data="$experiencia" />
    </div>
</x-layout>