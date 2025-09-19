<div class="row">
    <div class="col-sm-12">
        <x-card-table :tittle="'Roles'" :exportable="true">
            <x-slot name="button">
                @can('role delete')
                    <x-table.button-delete :bulkDisabled="$bulkDisabled" />                    
                @endcan
                @can('role update')
                    <x-table.button-edit :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('role create')
                    <x-table.button-create />                    
                @endcan
            </x-slot>
            <x-table.table :audit="$audit" wire:model="showauditor">
                <x-slot name="head">
                    <x-table.th field="name">Nombre</x-table.th>
                    <th class="text-center">Utilizados</th>
                </x-slot>
                @forelse ($roles as $item)
                    <tr>
                        <td class="p-1 text-center align-middle">
                            <input type="checkbox" class="form-check-input border border-1 border-primary"
                            wire:model="selectedModel"
                            value="{{ $item->id }}"
                            wire:click="$set('selected_id',{{ $item->id }})"
                            wire:change="$dispatch('role_id',{id: {{$item->id}} })"
                            >
                        </td>
                        <td class="p-1 text-dark">{{ $item->name }}</td>
                        <td class="p-1 text-dark text-center">{{ $item->count_user }}</td>
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
                {!! $roles->links() !!}
            </x-slot>
        </x-card-table>
    </div>
    @include('livewire.roles.form')
</div>
@push('scripts')
  
@endpush