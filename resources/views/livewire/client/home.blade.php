<div>
    @section('title', 'Home')
    @section('css')
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    @endsection

    @livewire('client.components.header')
    @livewire('client.components.hero')
    @livewire('client.components.about')
    @livewire('client.components.menus')
    @livewire('client.components.contact')
    @livewire('client.components.footer')
</div>
