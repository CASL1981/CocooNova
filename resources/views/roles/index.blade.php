@section('title', 'Roles y Permisos')
<x-app-layout>

    <div class="row grid-margin">
        <div class="col-md-6">
            @livewire('roles')
        </div>
        <div class="col-md-6">
            @livewire('permissions')
        </div>
    </div>
    
</x-app-layout>