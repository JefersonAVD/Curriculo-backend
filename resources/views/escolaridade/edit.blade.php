<x-layout navbar>
    @section('hearing')
        <x-topHeader back="escolaridade.index" titulo="{!!$pageTitle!!}"/>
    @endsection
    <div class="p-3">
        <x-escolaridade.form :action="route('escolaridade.update',$escola->id)" :data="$escola" />
    </div>
</x-layout>