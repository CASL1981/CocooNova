<div class="row">
    <div class="col-sm-12">
        <x-card-table :tittle="'Características'" :exportable="true" :audit="$audit">
            <x-slot name="button">
                @can('characteristic create')
                    <x-table.button-duplicar :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('characteristic update')
                    <x-table.button-edit :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('characteristic create')
                    <x-table.button-create />
                @endcan
            </x-slot>
            <x-table.table :audit="$audit" wire:model="showauditor">
                <x-slot name="head">
                    <x-table.th weight="80px" field="id">#</x-table.th>
                    <x-table.th field="name">Nombre</x-table.th>
                    <x-table.th field="FieldName">Campo</x-table.th>
                    <x-table.th field="Modelo">Modelo</x-table.th>
                </x-slot>
                @forelse ($characteristics as $key => $item)
                    <tr>
                        <td class="text-center align-middle">
                            <input type="checkbox" class="form-check-input border border-1 border-primary"
                            wire:model="selectedModel"
                            value="{{ $item->id }}"
                            wire:click="$set('selected_id',{{ $item->id }})"
                            wire:change="$dispatch('characteristic_id',{id: {{$item->id}} })"
                            >
                        </td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->FieldName }}</td>
                        <td>{{ $item->Modelo }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <x-table.error-search/>
                        </td>
                    </tr>
                @endforelse
            </x-table.table>
            <x-slot name="pagination">
                {!! $characteristics->links() !!}
            </x-slot>
        </x-card-table>
    </div>
    @include('livewire.characteristics.form')
</div>
@push('scripts')

@endpush