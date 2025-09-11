<x-confirmation-modal wire:model="show" maxWidth="lg" >
    <x:slot name="title">Crear Usuario</x:slot>
    <!--begin::Form-->
    <form>
        <div class="row mb-7">
            <div class="form-group col-md-3">
                <x-form.label for="form.identification" value="{{ __('Identificación') }}" />
                <x-form.input type="text" wire:model="form.identification" class="form-control-sm" maxlength="12"  pattern="\d{7,12}" 
                title="Debe tener entre 7 y 12 dígitos"></x-form.input>
                <x-form.input-error for="form.identification" class="mt-2"/>
            </div>
            <div class="form-group col-md-3">
                <x-form.label for="form.name" value="{{ __('Nombres') }}" />
                <x-form.input type="text" wire:model="form.name" class="form-control-sm" maxlength="100"></x-form.input>
                <x-form.input-error for="form.name" class="mt-2"/>
            </div>
            <div class="form-group col-md-3">
                <x-form.label for="form.lastname" value="{{ __('Apellidos') }}" />
                <x-form.input type="text" wire:model="form.lastname" class="form-control-sm" maxlength="100"></x-form.input>
                <x-form.input-error for="form.lastname" class="mt-2"/>
            </div>
            <div class="form-group col-md-3">
                <x-form.label for="form.area" value="{{ __('Area') }}" />
                <x-form.select wire:model="form.area" class="form-control-sm" id="area" 
                :options="['Administrativa' => 'Administrativa', 'Comercial' => 'Comercial', 'Farmacia' => 'Farmacia', 'Financiero' => 'Financiero', 'Logistica' => 'Logistica']"/>
                <x-form.input-error for="form.area" class="mt-2"/>
            </div>
        </div>
        <div class="row mb-7">
            <div class="form-group col-md-3">
                <x-form.label for="form.role_id" value="{{ __('Role') }}" />
                <x-form.select wire:model="form.role_id" class="form-control-sm" id="role_id" :options="['1' => 'Administrador']"/>
                <x-form.input-error for="form.role_id" class="mt-2"/>
            </div>
            <div class="form-group col-md-5">
                <x-form.label for="form.email" value="{{ __('Email') }}" />
                <x-form.input wire:model="form.email" class="form-control-sm" id="email" />
                <x-form.input-error for="form.email" class="mt-2"/>
            </div>
            <div class="form-group col-md-4">
                <x-form.label for="form.destination" value="{{ __('Destination') }}" />
                <x-form.select wire:model="form.destination" class="form-control-sm" id="destination"
                :options="['1' => 'Oficina Principal', '1000' => 'Farmacia Pueblo Nuevo']"/>
                <x-form.input-error for="form.destination" class="mt-2"/>
            </div>
        </div>
    </form>
    <!--end::Form-->
    <x:slot name="footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="method()">Guardar</button>
       {{-- <x-button>Guardar</x-button> --}}
    </x:slot>
</x-confirmation-modal>