<div class="row">
    <div class="col-sm-12">
        <x-card-table :tittle="'Contratos'" :exportable="true" :audit="$audit">
            <x-slot name="button">
                <div class="form-check form-switch d-flex align-items-left mr-3">
                    <input class="form-check-input" type="checkbox" id="activo" wire:model="showActive" wire:click="toggleShowActive()" >
                    <label class="form-check-label mr-3" for="activo" wire:model="showActive"></label>
                </div>
                @can('contracts toggle')
                    <x-table.button-toggle :bulkDisabled="$bulkDisabled" />                    
                @endcan
                @can('contracts update')
                    <button class="btn btn-icon btn-sm btn-primary" wire:click="detailContract()" title="Información adicional" @if ($bulkDisabled) disabled @endif>
                       <svg class="icon-32" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M20.4023 13.58C20.76 13.77 21.036 14.07 21.2301 14.37C21.6083 14.99 21.5776 15.75 21.2097 16.42L20.4943 17.62C20.1162 18.26 19.411 18.66 18.6855 18.66C18.3278 18.66 17.9292 18.56 17.6022 18.36C17.3365 18.19 17.0299 18.13 16.7029 18.13C15.6911 18.13 14.8429 18.96 14.8122 19.95C14.8122 21.1 13.872 22 12.6968 22H11.3069C10.1215 22 9.18125 21.1 9.18125 19.95C9.16081 18.96 8.31259 18.13 7.30085 18.13C6.96361 18.13 6.65702 18.19 6.40153 18.36C6.0745 18.56 5.66572 18.66 5.31825 18.66C4.58245 18.66 3.87729 18.26 3.49917 17.62L2.79402 16.42C2.4159 15.77 2.39546 14.99 2.77358 14.37C2.93709 14.07 3.24368 13.77 3.59115 13.58C3.87729 13.44 4.06125 13.21 4.23498 12.94C4.74596 12.08 4.43937 10.95 3.57071 10.44C2.55897 9.87 2.23194 8.6 2.81446 7.61L3.49917 6.43C4.09191 5.44 5.35913 5.09 6.38109 5.67C7.27019 6.15 8.425 5.83 8.9462 4.98C9.10972 4.7 9.20169 4.4 9.18125 4.1C9.16081 3.71 9.27323 3.34 9.4674 3.04C9.84553 2.42 10.5302 2.02 11.2763 2H12.7172C13.4735 2 14.1582 2.42 14.5363 3.04C14.7203 3.34 14.8429 3.71 14.8122 4.1C14.7918 4.4 14.8838 4.7 15.0473 4.98C15.5685 5.83 16.7233 6.15 17.6226 5.67C18.6344 5.09 19.9118 5.44 20.4943 6.43L21.179 7.61C21.7718 8.6 21.4447 9.87 20.4228 10.44C19.5541 10.95 19.2475 12.08 19.7687 12.94C19.9322 13.21 20.1162 13.44 20.4023 13.58ZM9.10972 12.01C9.10972 13.58 10.4076 14.83 12.0121 14.83C13.6165 14.83 14.8838 13.58 14.8838 12.01C14.8838 10.44 13.6165 9.18 12.0121 9.18C10.4076 9.18 9.10972 10.44 9.10972 12.01Z" fill="currentColor" /></svg> 
                    </button>
                    <x-table.button-edit :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('contracts create')
                    <x-table.button-create />
                @endcan
            </x-slot>
            <x-table.table :audit="$audit" wire:model="showauditor">
                <x-slot name="head">                    
                    <x-table.th field="status">Estado</x-table.th>
                    <x-table.th field="identification">Identificación</x-table.th>
                    <x-table.th field="full_name">Nombres y Apellidos</x-table.th>
                    <x-table.th field="hiring_date">Fecha Cont.</x-table.th>
                    <x-table.th field="termination_date">Fecha Term.</x-table.th>
                    <x-table.th field="destination">Centro Costo</x-table.th>
                    <x-table.th field="city">Ciudad</x-table.th>
                    <x-table.th field="type">Tipo Contrato</x-table.th>
                    <x-table.th field="probationary_period">Periodo Prueba</x-table.th>
                    <x-table.th field="salary">Salario</x-table.th>
                    <x-table.th field="work_schedule">Horario Trabajo</x-table.th>
                    <x-table.th field="reason_leaving">Motivo Retiro</x-table.th>
                    <x-table.th field="format">Formato</x-table.th>
                    <x-table.th field="observations">Observaciones</x-table.th>
                    <x-table.th field="period">Período</x-table.th>
                    <x-table.th field="year">Año</x-table.th>
                </x-slot>
                @forelse ($contracts as $key => $item)
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
                        <td class="p-1">{{ $item->full_name }}</td>
                        <td class="p-1 text-center">{{ $item->hiring_date->format('d/m/Y') }}</td>
                        <td class="p-1 text-center">{{ optional($item->termination_date)->format('d/m/Y') }}</td>
                        <td class="p-1">{{ Str::limit($item->destination, 20) }}</td>
                        <td class="p-1">{{ $item->city }}</td>
                        <td class="p-1">{{ $item->type }}</td>
                        <td class="p-1">{{ $item->probationary_period }}</td>
                        <td class="p-1">{{ $item->salary }}</td>
                        <td class="p-1">{{ $item->work_schedule }}</td>
                        <td class="p-1">{{ Str::limit($item->reason_leaving, 20) }}</td>
                        <td class="p-1">{{ $item->format }}</td>
                        <td class="p-1">{{ Str::limit($item->observations, 20) }}</td>
                        <td class="p-1 text-center">{{ $item->period }}</td>
                        <td class="p-1 text-center">{{ $item->year }}</td>
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
                {!! $contracts->links() !!}
            </x-slot>
        </x-card-table>
    </div>
    @include('talentohumano::livewire.contracts.form')
</div>
@push('scripts')
  
@endpush