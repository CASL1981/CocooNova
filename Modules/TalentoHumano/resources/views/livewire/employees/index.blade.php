<div class="row">
    <div class="col-sm-12">
        <x-card-table :tittle="'Empleados'" :exportable="true" :audit="$audit">
            <x-slot name="button">
                @can('employee toggle')
                    <x-table.button-toggle :bulkDisabled="$bulkDisabled" />                    
                @endcan
                @can('employee update')
                    <x-table.button-edit :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('employee create')
                    <x-table.button-create />
                @endcan
            </x-slot>
            <x-table.table :audit="$audit" wire:model="showauditor">
                <x-slot name="head">                    
                    <x-table.th field="type_document">Estado</x-table.th>
                    <x-table.th field="identification">Identificación</x-table.th>
                    <x-table.th field="first_name">Nombres</x-table.th>
                    <x-table.th field="last_name">Apellidos</x-table.th>
                    <x-table.th field="type_document">TD</x-table.th>
                    <x-table.th field="address">Dirección</x-table.th>
                    <x-table.th field="cel_phone">Celular</x-table.th>
                    <x-table.th field="entry_date">F. Ing.</x-table.th>
                    <x-table.th field="email">Email</x-table.th>
                    <x-table.th field="vendedor">Vendedor</x-table.th>
                    <x-table.th field="gender">Sex</x-table.th>
                    <x-table.th field="birth_date">F. Nac.</x-table.th>
                    <x-table.th field="location_id">Ubicación</x-table.th>
                    <x-table.th field="approve">Autoriza</x-table.th>
                </x-slot>
                @forelse ($employees as $key => $item)
                    <tr wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}">
                        <td class="text-center align-middle">
                            <input type="checkbox" class="form-check-input border border-1 border-primary"
                            wire:model="selectedModel"
                            value="{{ $item->id }}"
                            wire:click="$set('selected_id',{{ $item->id }})"
                            >
                        </td>
                        <td class="text-center align-middle">
                            <span class=" {{ $item->status ? 'badge bg-primary' : 'badge bg-danger'}}">{{ $item->status ? 'Activo' : 'Inactivo' }}</span>
                        </td>
                        <td class="p-1 text-right">{{ $item->identification }}</td>
                        <td class="p-1">{{ $item->first_name }}</td>
                        <td class="p-1">{{ $item->last_name }}</td>
                        <td class="p-1">{{ $item->type_document }}</td>
                        <td class="p-1">{{ Str::limit($item->address, 20) }}</td>
                        <td class="p-1 text-right">{{ $item->cel_phone }}</td>
                        <td class="p-1 text-center">{{ $item->entry_date }}</td>
                        <td class="p-1">{{ $item->email }}</td>
                        <td  class="p-1 text-center">{{ $item->vendedor ? 'Si' : 'No' }}</td>
                        <td class="p-1 text-center">{{ $item->gender }}</td>
                        <td class="p-1 text-right">{{ $item->birth_date->format('d/m/Y') }}</td>
                        <td class="p-1 text-right">{{ $item->destination->name }}</td>
                        <td class="p-1 text-center">{{ $item->approve ? 'Si' : 'No'}}</td>
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
                {!! $employees->links() !!}
            </x-slot>
        </x-card-table>
    </div>
    @include('talentohumano::livewire.employees.form')
</div>
@push('scripts')
  
@endpush