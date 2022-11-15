<x-layout :navbar="true">
    @section('hearing')
        <x-topHeader back='portfolio.index' titulo="{!!$pageTitle!!}"/>
    @endsection
    <div class="p-3">
        <x-portfolio.form :action="route('portfolio.update',$site->id)" :data="$site"/>
    </div>
</x-layout>