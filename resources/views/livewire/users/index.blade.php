<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="col-sm-12 col-md-4">
                        <h5 class="card-title">Usuarios</h5>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <label class="w-100">
                            <input wire:model.live='keyWord' type="search" class="form-control p-2" placeholder="Buscar">
                        </label>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="card-header-action d-flex justify-content-end">
                            <x-table.button-toggle :bulkDisabled="$bulkDisabled" />
                            <x-table.button-delete :bulkDisabled="$bulkDisabled" />
                            <x-table.button-edit :bulkDisabled="$bulkDisabled" />
                            <x-table.button-create />
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <x-table.table>
                        <x-slot name="head">
                            <x-table.th field="name">Profiles</x-table.th>
                            <x-table.th field="email">Email</x-table.th>
                            <x-table.th field="area">Area</x-table.th>
                            <x-table.th field="destination">C.C.</x-table.th>
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
                                <td class="p-1 text-dark">{{ $item->destination }}</td>
                                <td class="p-1 text-dark">{{ $item->role_id }}</td>
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
                    
                </div>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
    @include('livewire.users.form')
</div>
 @push('scripts')
  <script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('alert', (param) => {
            const type = param[0].type ?? 'info';
            const message = param[0].message ?? '';
            Toastr.options = {
            "closeButton" : true,
            "progressBar" : true
            }
            
            Toastr[param[0].type](param[0].message);
        });
        // Livewire.on('alert', (param) => {
        //     console.log(param[0].type);
        //     const type = param[0][0]?.type ?? 'info';
        //     const message = param[0][0]?.message ?? '';
        //     Toastr.options = {
        //         "closeButton": true,
        //         "progressBar": true
        //     };
        //     if (typeof Toastr[type] === 'function') {
        //         Toastr[type](message);
        //     } else {
        //         Toastr.info(message);
        //     }
        // });

        Livewire.on('destroyItem', (id) => {
          Swal.fire({
              title: 'Estas segro?',
              text: "¡Deseas Eliminar este Role!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Eliminalo!'
              }).then((result) => {
              if (result.isConfirmed) {
                  Livewire.dispatch('deleteItem')
              }});
        });
    });


  </script>
  @endpush