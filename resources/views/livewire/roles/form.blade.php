<x-confirmation-modal wire:model="show" maxWidth="md" >
    <x:slot name="title">Crear Roles</x:slot>
    <!--begin::Form-->
    <form>
        <div class="row mb-7">
            <div class="form-group">
                <x-form.label for="name" value="{{ __('Nombre Role') }}" />
                <x-form.input type="text" wire:model="name" class="form-control-sm" maxlength="100"  
                title="Debe tener maximo 100 dígitos"></x-form.input>
                <x-form.input-error for="name" class="mt-2"/>
            </div>            
        </div>
    </form>
    <!--end::Form-->
    <x:slot name="footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="method()">Guardar</button>
    </x:slot>
</x-confirmation-modal>