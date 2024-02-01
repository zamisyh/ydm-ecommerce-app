<div>
    @section('title', 'Admin Home')

    <div class="drawer-content" x-data="{ drawer: false }">

        @include('livewire.admin.components.header')
        @include('livewire.admin.components.sidebar')


       <div class="px-5" :class="{ 'lg:mx-80 lg:p-5': drawer }">
          Home Admin
       </div>

    </div>
</div>
