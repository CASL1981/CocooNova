<div class="row">
    <div class="col-sm-12">
        <x-card-table :tittle="'Permisos'">
            <x-slot name="button">                
                
            </x-slot>
            <div class="col-12">
                <div class="table-responsive tableFixHead">
                <table id="users-list" class="table">
                    <thead>
                    <x-table.th field="name" :sortField="$sortField" :sortDirection="$sortDirection">Permiso</x-table.th>
                    <th class="text-center">Check</th>
                    </thead>
                    <tbody>
                    @forelse ($permissions as $key => $permission)
                    <tr>
                        <div class="form-group">
                            <td>{{ $permission->name }}</td>
                            @can('role update')
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center form-check form-switch">
                                <input type="checkbox" class="form-check-input border border-1 border-primary"
                                {{$permission->check ? 'checked' : '' }}
                                wire:click="addPermisssionKey('{{$permission->name}}')"
                                class="check" id="status{{$key}}">
                                </div>
                            </td>
                            @endcan
                        </div>
                    </tr>
                    @empty
                    <tr>
                    <td colspan="7">
                        <div class="alert alert-warning" role="alert">
                            <i class="far fa-window-close"></i>
                            <strong>Up!</strong> Datos no Encontrados
                        </div>
                    </td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
                </div>
            </div>
            <x-slot name="pagination">
                {!! $permissions->links() !!}
            </x-slot>
        </x-card-table>
    </div>
</div>