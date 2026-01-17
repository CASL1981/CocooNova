@section('title', 'Características')
<x-app-layout>

    <div class="row grid-margin">
        <div class="col-md-6">
            @livewire('characteristics')
        </div>
        <div class="col-md-6">
            {{-- @livewire('permissions') --}}
        </div>
    </div>
    
</x-app-layout>