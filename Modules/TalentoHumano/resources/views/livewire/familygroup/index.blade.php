<div class="row">
    <div class="col-sm-12">
        <x-card-table :tittle="'Empleados'" :exportable="true" :audit="$audit">
            <x-slot name="button">                
                @can('familygroup delete')
                    <x-table.button-delete :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('familygroup update')
                    <x-table.button-edit :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('familygroup create')
                    <x-table.button-create />
                @endcan
            </x-slot>
            <x-table.table :audit="$audit" wire:model="showauditor">
                <x-slot name="head">                    
                    <x-table.th field="identification">Identificación</x-table.th>
                    <x-table.th field="name">Nombre</x-table.th>
                    <x-table.th field="kinship">Parentesco</x-table.th>
                    <x-table.th field="profession">Profesión</x-table.th>
                    <x-table.th field="ocupation">Ocupación</x-table.th>
                    <x-table.th field="company">Empresa</x-table.th>
                    <x-table.th field="education_level">Nivel Educativo</x-table.th>
                    <x-table.th field="birth_date">F. Nac.</x-table.th>
                    <x-table.th field="illness">Enfermedades</x-table.th>
                    <x-table.th field="phone">Telefono</x-table.th>                    
                </x-slot>
                @forelse ($familygroups as $key => $item)
                    <tr wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}">
                        <td class="text-center align-middle">
                            <input type="checkbox" class="form-check-input border border-1 border-primary"
                            wire:model="selectedModel"
                            value="{{ $item->id }}"
                            wire:click="$set('selected_id',{{ $item->id }})"
                            >
                        </td>
                        <td class="p-1 text-right">{{ $item->identification }}</td>
                        <td class="p-1 text-right">{{ $item->name }}</td>
                        <td class="p-1">{{ $item->kinship }}</td>
                        <td class="p-1">{{ $item->profession }}</td>
                        <td class="p-1">{{ $item->occupation }}</td>
                        <td class="p-1">{{ $item->company }}</td>
                        <td class="p-1 text-right">{{ $item->education_level }}</td>
                        <td class="p-1 text-center">{{ $item->birth_date->format('d/m/Y') }}</td>
                        <td class="p-1">{{ $item->illness }}</td>
                        <td class="p-1 text-right">{{ $item->phone }}</td>
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
                {!! $familygroups->links() !!}
            </x-slot>
        </x-card-table>
    </div>
    @include('talentohumano::livewire.familygroup.form')
</div>
@push('scripts')
  
@endpush        