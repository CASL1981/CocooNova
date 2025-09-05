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
                            <button class="btn btn-sm btn-primary" wire:click.prevent="$dispatch('destroyItem')" title="Eliminar Registro"
                            @if ($bulkDisabled) disabled @endif>
                            <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z" fill="currentColor"></path>
                                <path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="currentColor"></path>
                            </svg>
                            </button>
                            <button class="btn btn-sm btn-primary" wire:click="edit()" title="Editar Registro" 
                            @if ($bulkDisabled) disabled @endif>
                            <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z" fill="currentColor"></path></svg>
                            </button>
                            <button class="btn btn-sm btn-primary" wire:click="$set('show', true)">
                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z" fill="currentColor"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="custom-table-effect table-responsive border rounded">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="p-0 align-middle text-center" scope="col">
                                    <div class="form-check form-check-flat form-check-primary justify-content-center mx-auto" style="display: flex;">
                                        <input type="checkbox" class="form-check-input border border-1 border-primary" wire:model.live="selectAll">
                                    </div>
                                    </th>
                                    <th scope="col">Profiles</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">C.C.</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
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
                                        <td>
                                            <div class="d-flex justify-content-evenly">
                                                <a class="btn btn-primary btn-icon btn-sm rounded-pill" href="#" role="button">
                                                    <span class="btn-inner">
                                                        <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.4" d="M21.101 9.58786H19.8979V8.41162C19.8979 7.90945 19.4952 7.5 18.999 7.5C18.5038 7.5 18.1 7.90945 18.1 8.41162V9.58786H16.899C16.4027 9.58786 16 9.99731 16 10.4995C16 11.0016 16.4027 11.4111 16.899 11.4111H18.1V12.5884C18.1 13.0906 18.5038 13.5 18.999 13.5C19.4952 13.5 19.8979 13.0906 19.8979 12.5884V11.4111H21.101C21.5962 11.4111 22 11.0016 22 10.4995C22 9.99731 21.5962 9.58786 21.101 9.58786Z" fill="currentColor"></path>
                                                            <path d="M9.5 15.0156C5.45422 15.0156 2 15.6625 2 18.2467C2 20.83 5.4332 21.5001 9.5 21.5001C13.5448 21.5001 17 20.8533 17 18.269C17 15.6848 13.5668 15.0156 9.5 15.0156Z" fill="currentColor"></path>
                                                            <path opacity="0.4" d="M9.50023 12.5542C12.2548 12.5542 14.4629 10.3177 14.4629 7.52761C14.4629 4.73754 12.2548 2.5 9.50023 2.5C6.74566 2.5 4.5376 4.73754 4.5376 7.52761C4.5376 10.3177 6.74566 12.5542 9.50023 12.5542Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-primary btn-icon btn-sm rounded-pill ms-2" href="#" role="button">
                                                    <span class="btn-inner">
                                                        <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.4" d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z" fill="currentColor"></path>
                                                            <path d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z" fill="currentColor"></path>
                                                            <path opacity="0.4" d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-primary btn-icon btn-sm rounded-pill ms-2" href="#" role="button">
                                                    <span class="btn-inner">
                                                        <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.4" d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z" fill="currentColor"></path>
                                                            <path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>                                            
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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