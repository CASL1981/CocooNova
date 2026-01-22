<div class="row">
    <div class="col-sm-12">
        <x-card-table :tittle="'Detalles de Características'" :exportable="true">
            <x-slot name="button">
                @can('characteristic update')
                    <button class="btn btn-icon btn-sm btn-primary" wire:click.prevent="toggleItem" title="Activar o Desactivar Item"
                        @if ($bulkDisabled) disabled @endif>
                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-32" width="32" height="32" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M17.5227 7.39601V8.92935C19.2451 9.46696 20.5 11.0261 20.5 12.8884V17.8253C20.5 20.1308 18.5886 22 16.2322 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8253V12.8884C3.5 11.0261 4.75595 9.46696 6.47729 8.92935V7.39601C6.48745 4.41479 8.95667 2 11.9848 2C15.0535 2 17.5227 4.41479 17.5227 7.39601ZM12.0051 3.73904C14.0678 3.73904 15.7445 5.37871 15.7445 7.39601V8.7137H8.25553V7.37613C8.26569 5.36878 9.94232 3.73904 12.0051 3.73904ZM12.8891 16.4549C12.8891 16.9419 12.4928 17.3294 11.9949 17.3294C11.5072 17.3294 11.1109 16.9419 11.1109 16.4549V14.2488C11.1109 13.7718 11.5072 13.3843 11.9949 13.3843C12.4928 13.3843 12.8891 13.7718 12.8891 14.2488V16.4549Z" fill="currentColor"></path></svg>
                    </button>
                @endcan
                @can('characteristic delete')
                    <x-table.button-delete :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('characteristic update')
                    <x-table.button-edit :bulkDisabled="$bulkDisabled" />
                @endcan
                @can('characteristic create')
                    <x-table.button-create-detail/>
                @endcan
            </x-slot>
            <x-table.table :audit="$audit" wire:model="showauditor">
                <x-slot name="head">
                    <x-table.th field="name">Nombre</x-table.th>
                    <x-table.th field="abbreviation">Abreviatura</x-table.th>
                    <x-table.th field="code">Código</x-table.th>
                    <x-table.th field="value">Valor</x-table.th>
                    <x-table.th field="percentage">Porcentaje</x-table.th>
                    <x-table.th field="max">Maximo</x-table.th>
                    <x-table.th field="min">Minimo</x-table.th>
                    <x-table.th field="stock">Stock</x-table.th>
                    <th class="text-center">Estado</th>
                </x-slot>
                @forelse ($detailCharacteristics as $item)
                    <tr>
                        <td class="text-center align-middle">
                            <input type="checkbox" class="form-check-input border border-1 border-primary"
                            wire:model="selectedModel"
                            value="{{ $item->id }}"
                            wire:click="$set('selected_id',{{ $item->id }})"
                            >
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->abbreviation }}</td>
                        <td>{{ $item->code }}</td>
                        <td class="text-center">{{ $item->value }}</td>
                        <td class="text-center">{{ $item->percentage }}%</td>
                        <td class="text-center">{{ $item->max }}</td>
                        <td class="text-center">{{ $item->min }}</td>
                        <td class="text-center">{{ $item->stock }}</td>
                        <td class="text-center">
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
                {!! $detailCharacteristics->links() !!}
            </x-slot>
        </x-card-table>
    </div>
    @include('livewire.detail-characteristics.form')
</div>
@push('scripts')

@endpush