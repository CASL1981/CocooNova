<div class="row">
    <div class="col-sm-12">
        <x-card-table :tittle="'Centro de Costos'" :exportable="true" :audit="$audit">
            <x-slot name="button">
                @can('destination toggle')
                    <x-table.button-toggle :bulkDisabled="$bulkDisabled" />                    
                @endcan
                @can('destination create')
                    <x-table.button-duplicar :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('destination update')
                    <x-table.button-edit :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('destination create')
                    <x-table.button-create />
                @endcan
            </x-slot>
            <x-table.table :audit="$audit" wire:model="showauditor">
                <x-slot name="head">
                    <x-table.th weight="80px" field="id">#</x-table.th>
                    <x-table.th field="costcenter">CC</x-table.th>
                    <x-table.th field="name">Descripción</x-table.th>
                    <x-table.th field="address">Dirección</x-table.th>
                    <x-table.th field="phone">Telefono</x-table.th>
                    <x-table.th field="location">Ubicación</x-table.th>
                    <x-table.th field="minimun">Minimo</x-table.th>
                    <x-table.th field="maximun">Maximo</x-table.th>
                    <x-table.th field="status">Estado</x-table.th>
                </x-slot>
                @forelse ($destinations as $key => $item)
                    <tr>
                        <td class="text-center align-middle">
                            <input type="checkbox" class="form-check-input border border-1 border-primary"
                            wire:model="selectedModel"
                            value="{{ $item->id }}"
                            wire:click="$set('selected_id',{{ $item->id }})"
                            >
                        </td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->costcenter }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->minimun }}</td>
                        <td>{{ $item->maximun }}</td>
                        <td class="text-center align-middle">
                            <span class=" {{ $item->status ? 'badge bg-primary' : 'badge bg-danger'}}">{{ $item->status ? 'Activo' : 'Inactivo' }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <x-table.error-search/>
                        </td>
                    </tr>
                @endforelse
            </x-table.table>
            <x-slot name="pagination">
                {!! $destinations->links() !!}
            </x-slot>
        </x-card-table>
    </div>
    @include('livewire.destination.form')
</div>
@push('scripts')
  
@endpush