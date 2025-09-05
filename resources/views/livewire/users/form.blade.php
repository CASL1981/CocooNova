<x-confirmation-modal wire:model="show" maxWidth="lg" >
    <x:slot name="title">Crear Usuario</x:slot>
    <!--begin::Form-->
    <form>
        <div class="row mb-7">
            <div class="form-group col-md-3">
                <x-form.label for="identification" value="{{ __('Identificación') }}" />
                <x-form.input type="text" wire:model="identification" class="form-control-sm" maxlength="12"  pattern="\d{7,12}" 
                title="Debe tener entre 7 y 12 dígitos"></x-form.input>
                <x-form.input-error for="identification" class="mt-2"/>
            </div>
            <div class="form-group col-md-3">
                <x-form.label for="name" value="{{ __('Nombres') }}" />
                <x-form.input type="text" wire:model="name" class="form-control-sm" maxlength="100"></x-form.input>
                <x-form.input-error for="name" class="mt-2"/>
            </div>
            <div class="form-group col-md-3">
                <x-form.label for="lastname" value="{{ __('Apellidos') }}" />
                <x-form.input type="text" wire:model="lastname" class="form-control-sm" maxlength="100"></x-form.input>
                <x-form.input-error for="lastname" class="mt-2"/>
            </div>
            <div class="form-group col-md-3">
                <x-form.label for="area" value="{{ __('Area') }}" />
                <x-form.select wire:model="area" class="form-control-sm" id="area" 
                :options="['Administrativa' => 'Administrativa', 'Comercial' => 'Comercial', 'Farmacia' => 'Farmacia', 'Financiero' => 'Financiero', 'Logistica' => 'Logistica']"/>
                <x-form.input-error for="area" class="mt-2"/>
            </div>
        </div>
        <div class="row mb-7">
            <div class="form-group col-md-3">
                <x-form.label for="role_id" value="{{ __('Role') }}" />
                <x-form.select wire:model="role_id" class="form-control-sm" id="role_id" :options="['1' => 'Administrador']"/>
                <x-form.input-error for="role_id" class="mt-2"/>
            </div>
            <div class="form-group col-md-5">
                <x-form.label for="email" value="{{ __('Email') }}" />
                <x-form.input wire:model="email" class="form-control-sm" id="email" />
                <x-form.input-error for="email" class="mt-2"/>
            </div>
            <div class="form-group col-md-4">
                <x-form.label for="destination" value="{{ __('Destination') }}" />
                <x-form.select wire:model="destination" class="form-control-sm" id="destination"
                :options="['1' => 'Oficina Principal', '1000' => 'Farmacia Pueblo Nuevo']"/>
                <x-form.input-error for="destination" class="mt-2"/>
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