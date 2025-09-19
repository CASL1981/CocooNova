<div class="row">
    <div class="col-sm-12">
        <x-card-table :tittle="'Usuarios'" :exportable="true" :audit="$audit">
            <x-slot name="button">
                @can('user toggle')
                    <x-table.button-toggle :bulkDisabled="$bulkDisabled" />                    
                @endcan
                @can('user delete')
                    <x-table.button-delete :bulkDisabled="$bulkDisabled" />                    
                @endcan
                @can('user update')
                    <x-table.button-edit :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('user create')
                    <x-table.button-create />
                @endcan
            </x-slot>
            <x-table.table :audit="$audit" wire:model="showauditor">
                <x-slot name="head">
                    <x-table.th field="name">Profiles</x-table.th>
                    <x-table.th field="email">Email</x-table.th>
                    <x-table.th field="area">Area</x-table.th>
                    <x-table.th class="text-center" field="destination">C.C.</x-table.th>
                    <x-table.th field="role_id">Role</x-table.th>
                    <x-table.th field="status" class="text-center">Status</x-table.th>
                </x-slot>
                @forelse ($users as $item)
                    <tr>
                        <td class="p-1 text-center align-middle">
                            <input type="checkbox" class="form-check-input border border-1 border-primary"
                            wire:model="selectedModel"
                            value="{{ $item->id }}"
                            wire:click="$set('selected_id',{{ $item->id }})"
                            >
                        </td>
                        <td class="p-1">
                            <div class="d-flex align-items-center">
                                <img class="rounded img-fluid avatar-40 me-3" src="{{ asset('assets/images/avatars/default-avatar.png') }} " alt="" loading="lazy">
                                <div class="media-support-info">
                                <h5 class="iq-sub-label">{{ $item->name }} {{ $item->lastname }}</h5>
                                <p class="mb-0">{{ $item->identification }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-1 text-dark">{{ $item->email }}</td>
                        <td class="p-1 text-dark">{{ $item->area }}</td>
                        <td class="p-1 text-center text-dark">{{ $item->destination }}</td>
                        <td class="p-1 text-dark">{{ $item->role_id ? $roles[$item->role_id] : 'Sin Rol' }}</td>
                        <td class="p-1 text-center align-middle">
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
                {!! $users->links() !!}
            </x-slot>
        </x-card-table>
    </div>
    @include('livewire.users.form')
</div>
@push('scripts')
  
@endpush