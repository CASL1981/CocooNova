<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div class="header-title">
        <h4 class="card-title">Tabs Fill and justify</h4>
        </div>
    </div>
    <div class="card-body">
        <p>Force your <code>.nav</code>’s contents to extend the full available width one of two modifier classes. To proportionately fill all available space with your <code>.nav-item</code>s, use <code>.nav-fill</code>. Notice that all horizontal space is occupied, but not every nav item has the same width.</p>
        <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab-fill" data-bs-toggle="pill" href="#pills-home-fill" role="tab" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab-fill" data-bs-toggle="pill" href="#pills-profile-fill" role="tab" aria-selected="false">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab-fill" data-bs-toggle="pill" href="#pills-contact-fill" role="tab" aria-selected="false">Contact</a>
        </li>
        </ul>
        <div class="tab-content" id="pills-tabContent-1">
        <div class="tab-pane fade show active" id="pills-home-fill" role="tabpanel" aria-labelledby="pills-home-tab-fill">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
        <div class="tab-pane fade" id="pills-profile-fill" role="tabpanel" aria-labelledby="pills-profile-tab-fill">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
        <div class="tab-pane fade" id="pills-contact-fill" role="tabpanel" aria-labelledby="pills-contact-tab-fill">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
        </div>
    </div>
</div>

{{-- <div>
    @if ($selected_id > 0)
        <div class="row mb-1">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-body">
                                <label class="ml-2"><strong>Datos del Usuario</strong></label>
                                <p class="m-0">Nombre Empleado: <strong
                                        class="text-info">{{ $pending->user->fullName }}</strong></p>
                                <p class="m-0">Area: <strong class="text-info">{{ $pending->user->area }}</strong></p>
                                <p class="m-0">Centro Costo: <strong
                                        class="text-info">{{ $pending->user->destination }}</strong></p>
                                <p class="m-0">Email: <strong class="text-info">{{ $pending->user->email }}</strong></p>
                                <p class="m-0"><a href="{{ asset('/files/detallepedido.xlsx') }}" download target="_blank">Archivo Base</a></p>
                            </div>

                        </div>
                        <div class="col-md-4 b-1">
                            <div class="card-body">
                                <label><strong>Datos del Pendiente</strong></label>
                                <p class="m-0">Numero Pedido: <strong class="text-primary">{{ $pending->id }}</strong></p>
                                <p class="m-0">Categoria: <strong
                                        class="text-primary">{{ ucwords(strtolower($pending->category)) }}</strong></p>
                                <p class="m-0">Centro de costo: <strong
                                        class="text-primary">{{ $pending->destination }}</strong></p>
                                <p class="m-0">EPS: <strong
                                        class="text-primary">{{ ucwords(strtolower($pending->EPS)) }}</strong></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <label for="type"><strong>Datos del contrato</strong></label>
                                <p class="m-0">Modalidad: <strong
                                        class="text-primary">{{ ucwords(strtolower($pending->contracting_modality)) }}</strong>
                                </p>
                                <p class="m-0">Metodo Facturación: <strong
                                        class="text-primary">{{ ucwords(strtolower($pending->invoicing_method)) }}</strong>
                                </p>
                                <p class="m-0">Aprobado Gerente: <strong class="text-primary">{{ ucwords(strtolower($pending->manager)) }}</strong></p>
                                <form action="{{ route('pharmacy.detail.pending.import')}} " method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group d-flex align-items-center">
                                      <label for="customFile1" class="form-label custom-file-input"></label>
                                      <input class="form-control mr-2" type="file" name="file" id="file" accept=".xlsx, .xls">
                                      <button type="submit" class="btn btn-primary btn-sm ml-3">Importar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <label for="Seleccione un Proveedor">Seleccione un Proveedor</label>
                                <select name="" id="" class="form-control form-control-lg" wire:model.lazy="selected_id">
                                    <option value="Elegir">-- Selecion --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="form-control">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <x-label for="product_id" value="Producto *" />
                    <x-select2 wire:model="product_id" id="product_id" :options="$products" />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <x-label for="brand" value="Marca" />
                    <x-input wire:model="brand" class="form-control form-control-sm" placeholder="Marca" />
                    <x-input-error for="brand" />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <x-label for="quantity" value="Cantidad *" />
                    <x-input wire:model="quantity" class="form-control form-control-sm" placeholder="Cantidad" />
                    <x-input-error for="quantity" />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <x-label for="destination" value="C. C. *" />
                    <x-select wire:model="destination" id="destination" :options="$destinations" />
                    <x-input-error for="destination" />
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm float-right mt-4 ml-3"
                        wire:click.prevent="addProduct()">Add</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid mt-1 d-flex justify-content-center px-0">
                    <div class="table-responsive tableFixHead w-100">
                        <x-table.table :audit="$audit" style="font-size: 12px;">
                            <x-slot name="head" model="$pendingProducts">
                                <x-table.th>#</x-table.th>
                                <x-table.th field="product_name">Producto</x-table.th>
                                <x-table.th field="brand">Marca</x-table.th>
                                <x-table.th field="quantity">Cantidad</x-table.th>
                                <x-table.th field="destination">C C.</x-table.th>
                                <x-table.th field="created_at">Fecha</x-table.th>
                                <x-table.th>Acciones</x-table.th>
                            </x-slot>
                            @forelse ($pendingProducts as $key => $item)
                                @if ($item->status === "Editing")
                                    <tr>
                                        <td class="p-1">{{ $key + 1 }}</td>
                                        <td class="p-1">{{ Str::limit($item->product_name, 50, '...') }}</td>
                                        <td class="p-1 text-center"><input type="text" wire:model="brandE" class="form-control form-control-sm text-info"></td>
                                        <td class="p-1 text-center"><input type="number" wire:model="quantityE" class="form-control form-control-sm text-info"></td>
                                        <td class="p-1 text-center"><input type="text" wire:model="destinationE" class="form-control form-control-sm text-info"></td>
                                        <td class="p-1">{{ $item->created_at->format('d/m/Y') }}</td>
                                        <td class="p-1">
                                            <a href="#" class="btn-sm bg-soft-primary"
                                                wire:click.prevent="updateEditingItem({{ $item->id }})">
                                                <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4.91988 12.257C4.2856 12.257 3.65131 12.5199 3.19988 13.0342C2.79417 13.4913 2.59417 14.0799 2.63417 14.6913C2.67417 15.3027 2.94846 15.857 3.4056 16.2627L7.51417 19.8684C7.93131 20.2342 8.46846 20.4399 9.02274 20.4399C9.0856 20.4399 9.14846 20.4399 9.21131 20.4342C9.82846 20.3827 10.4056 20.0799 10.7942 19.5999L20.857 7.27986C21.657 6.30272 21.5085 4.85701 20.5313 4.05701C20.057 3.67415 19.4627 3.49129 18.857 3.55415C18.2513 3.61701 17.7027 3.90844 17.3142 4.38272L8.74846 14.8627L6.42274 12.8227C5.99417 12.4456 5.45131 12.257 4.91988 12.257Z" fill="url(#paint0_linear)"></path> <path d="M9.02279 20.0284C8.56565 20.0284 8.12565 19.8627 7.78279 19.5598L3.67422 15.9541C2.89708 15.2684 2.81708 14.0798 3.50279 13.3027C4.18851 12.5255 5.37708 12.4455 6.15422 13.1313L8.79994 15.4513L17.6285 4.63983C18.2856 3.83412 19.4685 3.71983 20.2742 4.37126C21.0799 5.0284 21.1942 6.21126 20.5428 7.01697L10.4742 19.337C10.1542 19.7313 9.67993 19.977 9.17708 20.0227C9.12565 20.0227 9.07422 20.0284 9.02279 20.0284Z" fill="url(#paint1_linear)"></path> <path opacity="0.75" d="M9.02279 20.0284C8.56565 20.0284 8.12565 19.8627 7.78279 19.5598L3.67422 15.9541C2.89708 15.2684 2.81708 14.0798 3.50279 13.3027C4.18851 12.5255 5.37708 12.4455 6.15422 13.1313L8.79994 15.4513L17.6285 4.63983C18.2856 3.83412 19.4685 3.71983 20.2742 4.37126C21.0799 5.0284 21.1942 6.21126 20.5428 7.01697L10.4742 19.337C10.1542 19.7313 9.67993 19.977 9.17708 20.0227C9.12565 20.0227 9.07422 20.0284 9.02279 20.0284Z" fill="url(#paint2_radial)"></path> <path opacity="0.5" d="M9.02279 20.0284C8.56565 20.0284 8.12565 19.8627 7.78279 19.5598L3.67422 15.9541C2.89708 15.2684 2.81708 14.0798 3.50279 13.3027C4.18851 12.5255 5.37708 12.4455 6.15422 13.1313L8.79994 15.4513L17.6285 4.63983C18.2856 3.83412 19.4685 3.71983 20.2742 4.37126C21.0799 5.0284 21.1942 6.21126 20.5428 7.01697L10.4742 19.337C10.1542 19.7313 9.67993 19.977 9.17708 20.0227C9.12565 20.0227 9.07422 20.0284 9.02279 20.0284Z" fill="url(#paint3_radial)"></path> <defs> <linearGradient id="paint0_linear" x1="15.825" y1="-13.9667" x2="9.82533" y2="23.9171" gradientUnits="userSpaceOnUse"> <stop stop-color="#00CC00"></stop> <stop offset="0.1878" stop-color="#06C102"></stop> <stop offset="0.5185" stop-color="#17A306"></stop> <stop offset="0.9507" stop-color="#33740C"></stop> <stop offset="1" stop-color="#366E0D"></stop> </linearGradient> <linearGradient id="paint1_linear" x1="15.2501" y1="0.625426" x2="7.43443" y2="23.6215" gradientUnits="userSpaceOnUse"> <stop offset="0.2544" stop-color="#90D856"></stop> <stop offset="0.736" stop-color="#00CC00"></stop> <stop offset="0.7716" stop-color="#0BCD07"></stop> <stop offset="0.8342" stop-color="#29CF18"></stop> <stop offset="0.9166" stop-color="#59D335"></stop> <stop offset="1" stop-color="#90D856"></stop> </linearGradient> <radialGradient id="paint2_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(15.452 8.95803) rotate(116.129) scale(8.35776 4.28316)"> <stop stop-color="#FBE07A" stop-opacity="0.75"></stop> <stop offset="0.0803394" stop-color="#FBE387" stop-opacity="0.6897"></stop> <stop offset="0.5173" stop-color="#FDF2C7" stop-opacity="0.362"></stop> <stop offset="0.8357" stop-color="#FFFBF0" stop-opacity="0.1233"></stop> <stop offset="1" stop-color="white" stop-opacity="0"></stop> </radialGradient> <radialGradient id="paint3_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(11.6442 17.0245) rotate(155.316) scale(9.80163 4.14906)"> <stop stop-color="#440063" stop-opacity="0.25"></stop> <stop offset="1" stop-color="#420061" stop-opacity="0"></stop> </radialGradient> </defs> </g></svg>
                                            </a>
                                            <a href="#" class="btn-sm bg-soft-danger"
                                                wire:click.prevent="cancelEditingItem({{ $item->id }})">
                                                <svg class="icon-24" width="24" height="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.003 512.003" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon style="fill:#CFF09E;" points="256.001,158.605 114.833,17.437 17.437,114.83 158.605,256 17.437,397.17 114.833,494.563 255.603,353.793 256.001,353.395 "></polygon> <path style="fill:#507C5C;" d="M378.055,256l128.84-128.839c6.809-6.809,6.809-17.85,0-24.659L409.498,5.105 c-6.807-6.807-17.85-6.807-24.659,0L256.001,133.944L127.162,5.105c-0.425-0.425-0.868-0.825-1.325-1.196 C122.643,1.303,118.737,0,114.833,0c-2.232,0-4.462,0.425-6.561,1.276c-2.099,0.851-4.066,2.127-5.768,3.829L5.108,102.503 c-6.809,6.809-6.809,17.85,0,24.659L133.948,256L5.108,384.839c-6.809,6.809-6.809,17.85,0,24.659l97.395,97.395 c3.405,3.404,7.867,5.107,12.329,5.107c4.462,0,8.926-1.704,12.329-5.107l140.771-140.772l0.398-0.398 c0.413-0.413,0.802-0.844,1.168-1.292c0.277-0.34,0.527-0.694,0.776-1.048c0.077-0.112,0.166-0.214,0.241-0.328 c0.289-0.432,0.549-0.877,0.795-1.329c0.024-0.044,0.052-0.085,0.077-0.129c0.244-0.459,0.462-0.926,0.663-1.4 c0.021-0.047,0.045-0.092,0.065-0.141c0.185-0.45,0.344-0.907,0.49-1.367c0.026-0.082,0.059-0.16,0.085-0.244 c0.127-0.422,0.227-0.849,0.321-1.278c0.028-0.129,0.068-0.253,0.094-0.382c0.08-0.405,0.131-0.814,0.183-1.222 c0.019-0.157,0.052-0.31,0.068-0.467c0.051-0.525,0.075-1.053,0.078-1.58c0-0.04,0.005-0.08,0.005-0.12V165.829L397.171,42.095 l72.737,72.737l-128.84,128.839c-6.809,6.809-6.809,17.85,0,24.661l128.84,128.839l-72.737,72.737l-60.407-60.407 c-6.809-6.809-17.85-6.809-24.661,0c-6.809,6.809-6.809,17.85,0,24.661l72.737,72.737c3.405,3.404,7.867,5.107,12.329,5.107 c4.462,0,8.926-1.704,12.329-5.107l97.395-97.395c6.809-6.809,6.809-17.85,0-24.659L378.055,256z M170.937,268.329 c6.809-6.809,6.809-17.85,0-24.661L42.096,114.83l72.737-72.737l123.732,123.733v180.345L114.833,469.905l-72.737-72.737 L170.937,268.329z"></path> </g></svg>
                                            </a>
                                        </td>
                                    </tr>
                                @else
                                    <tr class="{{ $item->status === 'Agotado' ? 'bg-soft-warning' : '' }}">
                                        <td class="p-1">{{ $key + 1 }}</td>
                                        <td class="p-1">{{ Str::limit($item->product_name, 50, '...') }}</td>
                                        <td class="p-1">{{ $item->brand }}</td>
                                        <td class="p-1 text-center">{{ $item->quantity }}</td>
                                        <td class="p-1">{{ $item->destination }}</td>
                                        <td class="p-1">{{ $item->created_at->format('d/m/Y') }}</td>
                                        <td class="p-1">
                                            <a href="#" class="btn-sm bg-soft-primary"
                                                wire:click.prevent="editingItem({{ $item->id }})">
                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-24" width="24"
                                                    height="24" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </a>
                                            <a href="#" class="btn-sm bg-soft-danger"
                                                wire:click.prevent="removeItem({{ $item->id }})">
                                                <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M20.2871 5.24297C20.6761 5.24297 21 5.56596 21 5.97696V6.35696C21 6.75795 20.6761 7.09095 20.2871 7.09095H3.71385C3.32386 7.09095 3 6.75795 3 6.35696V5.97696C3 5.56596 3.32386 5.24297 3.71385 5.24297H6.62957C7.22185 5.24297 7.7373 4.82197 7.87054 4.22798L8.02323 3.54598C8.26054 2.61699 9.0415 2 9.93527 2H14.0647C14.9488 2 15.7385 2.61699 15.967 3.49699L16.1304 4.22698C16.2627 4.82197 16.7781 5.24297 17.3714 5.24297H20.2871ZM18.8058 19.134C19.1102 16.2971 19.6432 9.55712 19.6432 9.48913C19.6626 9.28313 19.5955 9.08813 19.4623 8.93113C19.3193 8.78413 19.1384 8.69713 18.9391 8.69713H5.06852C4.86818 8.69713 4.67756 8.78413 4.54529 8.93113C4.41108 9.08813 4.34494 9.28313 4.35467 9.48913C4.35646 9.50162 4.37558 9.73903 4.40755 10.1359C4.54958 11.8992 4.94517 16.8102 5.20079 19.134C5.38168 20.846 6.50498 21.922 8.13206 21.961C9.38763 21.99 10.6811 22 12.0038 22C13.2496 22 14.5149 21.99 15.8094 21.961C17.4929 21.932 18.6152 20.875 18.8058 19.134Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <x-otros.error-search></x-otros.error-search>
                                    <td>
                                </tr>
                            @endforelse
                        </x-table.table>
                    </div>
                </div>
                {!! $pendingProducts->links() !!}
            </div>
        </div>
    </div>
</div> --}}
@push('styles')
    <!-- Select2 -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            /* background-color: #EEF9FF !important; */
            padding-right: 0.5rem !important;
            padding-left: 0.5rem !important;
            border: 0px solid #aaa !important;
            border-radius: 0.25rem;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #eee;
            border-radius: 0.25rem;
            height: 35px;
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 0.75rem;
            font-weight: 400;
            line-height: 1.5;
            color: #8A92A6;
            background-clip: padding-box;
            appearance: none;
            border-radius: 2px;
            transition: border-color 0.15s ease-in-out box-shadow 0.15s ease-in-out;
        }
    </style> --}}

@endpush
@push('scripts')

    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('.select2').select2();
        });
    </script> --}}
@endpush