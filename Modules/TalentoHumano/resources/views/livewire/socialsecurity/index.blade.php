<div class="row">
    <div class="col-sm-12">
        <x-card-table :tittle="'Seguridad Social'" :exportable="true" :audit="$audit">
            <x-slot name="button">
                @can('socialsecurity toggle')
                    <x-table.button-toggle :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('socialsecurity update')
                    <x-table.button-edit :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('socialsecurity create')
                    <x-table.button-duplicar :bulkDisabled="$bulkDisabled" />
                    <button class="btn btn-icon btn-sm btn-primary" wire:click="$set('showModalSocialSecurity', true)">
                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z" fill="currentColor"></path>
                        </svg>
                    </button>
                @endcan
            </x-slot>
            <x-table.table :audit="$audit" wire:model="showauditor">
                <x-slot name="head">                    
                    <x-table.th field="position">Cargo</x-table.th>
                    <x-table.th field="work_location">Ubicación Laboral</x-table.th>
                    <x-table.th field="contract_type">Tipo Contrato</x-table.th>
                    <x-table.th field="salary">Salario</x-table.th>
                    <x-table.th field="start_date">Fecha Inicial</x-table.th>
                    <x-table.th field="end_date">Fecha Término</x-table.th>
                    <x-table.th field="status">Estado</x-table.th>
                    <x-table.th field="destination">Centro Costo</x-table.th>
                    <x-table.th field="eps">EPS</x-table.th>
                    <x-table.th field="afp">AFP</x-table.th>
                    <x-table.th field="risk">Nivel Riesgo</x-table.th>
                    <x-table.th field="work_shift">Turno de Trabajo</x-table.th>
                </x-slot>
                @forelse ($socialSecurities as $key => $item)
                    <tr wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}">
                        <td class="text-center align-middle">
                            <input type="checkbox" class="form-check-input border border-1 border-primary"
                            wire:model="selectedModel"
                            value="{{ $item->id }}"
                            wire:click="$set('selected_id',{{ $item->id }})"
                            >
                        </td>
                        <td class="p-1 text-right">{{ Str::limit($item->position, 20) }}</td>
                        <td class="p-1">{{ Str::limit($item->work_location, 20) }}</td>
                        <td class="p-1">{{ $item->contract_type?->label() }}</td>
                        <td class="p-1">{{ number_format($item->salary, 0) }}</td>
                        <td class="p-1 text-center">{{ optional($item->start_date)->format('d/m/Y') }}</td>
                        <td class="p-1 text-center">{{ optional($item->end_date)->format('d/m/Y') }}</td>
                        <td class="text-center align-middle">
                            <span class=" {{ $item->status ? 'badge bg-primary' : 'badge bg-danger'}}">{{ $item->status ? 'Activo' : 'Inactivo' }}</span>
                        </td>
                        <td class="p-1">{{ Str::limit($item->destination, 20) }}</td>
                        <td class="p-1">{{ Str::limit($item->eps, 20) }}</td>
                        <td class="p-1">{{ Str::limit($item->afp, 20) }}</td>
                        <td class="p-1">{{ Str::limit($item->risk, 20) }}</td>
                        <td class="p-1">{{ Str::limit($item->work_shift, 20) }}</td>
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
                {!! $socialSecurities->links() !!}
            </x-slot>
        </x-card-table>
    </div>
    @include('talentohumano::livewire.socialsecurity.form')
</div>
@push('scripts')

@endpush