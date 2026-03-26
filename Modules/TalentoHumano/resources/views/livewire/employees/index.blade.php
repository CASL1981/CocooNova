<div class="row">
    <div class="col-sm-12">
        <x-card-table :tittle="'Empleados'" :exportable="true" :audit="$audit">
            <x-slot name="button">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="activo" wire:model="showActive" wire:click="toggleShowActive()" >
                    <label class="form-check-label mr-3" for="activo" wire:model="showActive"></label>
                </div>
                @can('employee toggle')
                    <x-table.button-toggle :bulkDisabled="$bulkDisabled" />                    
                @endcan
                @can('employee update')
                    <button class="btn btn-icon btn-sm btn-primary" wire:click="createContract()" title="Crear contrato" @if ($bulkDisabled) disabled @endif>
                        <svg class="icon-32" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.7044 3.51898C10.034 3.51898 9.46373 3.9848 9.30365 4.61265H14.6863C14.5263 3.9848 13.956 3.51898 13.2856 3.51898H10.7044ZM16.2071 4.61264H18.1881C20.2891 4.61264 22 6.34428 22 8.47085C22 8.47085 21.94 9.3711 21.92 10.6248C21.918 10.724 21.8699 10.8212 21.7909 10.88C21.3097 11.2354 20.8694 11.5291 20.8294 11.5493C19.1686 12.6632 17.2386 13.447 15.1826 13.8369C15.0485 13.8632 14.9165 13.7934 14.8484 13.6739C14.2721 12.6754 13.1956 12.0253 11.995 12.0253C10.8024 12.0253 9.71586 12.6683 9.12256 13.6678C9.05353 13.7853 8.92346 13.8531 8.7904 13.8278C6.75138 13.4369 4.82141 12.6541 3.17059 11.5594L2.21011 10.8911C2.13007 10.8405 2.08004 10.7493 2.08004 10.6481C2.05003 10.1316 2 8.47085 2 8.47085C2 6.34428 3.71086 4.61264 5.81191 4.61264H7.78289C7.97299 3.1443 9.2036 2 10.7044 2H13.2856C14.7864 2 16.017 3.1443 16.2071 4.61264ZM21.6598 12.8152L21.6198 12.8355C19.5988 14.1924 17.1676 15.0937 14.6163 15.4684C14.2561 15.519 13.8959 15.2861 13.7959 14.9216C13.5758 14.0912 12.8654 13.5443 12.015 13.5443H12.005H11.985C11.1346 13.5443 10.4242 14.0912 10.2041 14.9216C10.1041 15.2861 9.74387 15.519 9.38369 15.4684C6.83242 15.0937 4.4012 14.1924 2.38019 12.8355C2.37019 12.8254 2.27014 12.7646 2.1901 12.8152C2.10005 12.8659 2.10005 12.9874 2.10005 12.9874L2.17009 18.1519C2.17009 20.2785 3.87094 22 5.97199 22H18.018C20.1191 22 21.8199 20.2785 21.8199 18.1519L21.9 12.9874C21.9 12.9874 21.9 12.8659 21.8099 12.8152C21.7599 12.7849 21.6999 12.795 21.6598 12.8152ZM12.7454 17.0583C12.7454 17.4836 12.4152 17.8177 11.995 17.8177C11.5848 17.8177 11.2446 17.4836 11.2446 17.0583V15.7519C11.2446 15.3367 11.5848 14.9924 11.995 14.9924C12.4152 14.9924 12.7454 15.3367 12.7454 15.7519V17.0583Z" fill="currentColor" />
                        </svg>
                    </button>
                    <button class="btn btn-icon btn-sm btn-primary" wire:click="manageProfile()" title="Información adicional" @if ($bulkDisabled) disabled @endif>
                        <svg class="icon-32" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M20.4023 13.58C20.76 13.77 21.036 14.07 21.2301 14.37C21.6083 14.99 21.5776 15.75 21.2097 16.42L20.4943 17.62C20.1162 18.26 19.411 18.66 18.6855 18.66C18.3278 18.66 17.9292 18.56 17.6022 18.36C17.3365 18.19 17.0299 18.13 16.7029 18.13C15.6911 18.13 14.8429 18.96 14.8122 19.95C14.8122 21.1 13.872 22 12.6968 22H11.3069C10.1215 22 9.18125 21.1 9.18125 19.95C9.16081 18.96 8.31259 18.13 7.30085 18.13C6.96361 18.13 6.65702 18.19 6.40153 18.36C6.0745 18.56 5.66572 18.66 5.31825 18.66C4.58245 18.66 3.87729 18.26 3.49917 17.62L2.79402 16.42C2.4159 15.77 2.39546 14.99 2.77358 14.37C2.93709 14.07 3.24368 13.77 3.59115 13.58C3.87729 13.44 4.06125 13.21 4.23498 12.94C4.74596 12.08 4.43937 10.95 3.57071 10.44C2.55897 9.87 2.23194 8.6 2.81446 7.61L3.49917 6.43C4.09191 5.44 5.35913 5.09 6.38109 5.67C7.27019 6.15 8.425 5.83 8.9462 4.98C9.10972 4.7 9.20169 4.4 9.18125 4.1C9.16081 3.71 9.27323 3.34 9.4674 3.04C9.84553 2.42 10.5302 2.02 11.2763 2H12.7172C13.4735 2 14.1582 2.42 14.5363 3.04C14.7203 3.34 14.8429 3.71 14.8122 4.1C14.7918 4.4 14.8838 4.7 15.0473 4.98C15.5685 5.83 16.7233 6.15 17.6226 5.67C18.6344 5.09 19.9118 5.44 20.4943 6.43L21.179 7.61C21.7718 8.6 21.4447 9.87 20.4228 10.44C19.5541 10.95 19.2475 12.08 19.7687 12.94C19.9322 13.21 20.1162 13.44 20.4023 13.58ZM9.10972 12.01C9.10972 13.58 10.4076 14.83 12.0121 14.83C13.6165 14.83 14.8838 13.58 14.8838 12.01C14.8838 10.44 13.6165 9.18 12.0121 9.18C10.4076 9.18 9.10972 10.44 9.10972 12.01Z" fill="currentColor" /></svg> 
                    </button>
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