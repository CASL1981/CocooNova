@section('title', 'Características')
<x-app-layout>

    <div class="row grid-margin">
        <div class="col-md-5">
            @livewire('characteristics')
        </div>
        <div class="col-md-7">
            @livewire('detail-characteristics')
        </div>
    </div>
    
</x-app-layout>