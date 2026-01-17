<x-confirmation-modal wire:model="show" maxWidth="lg">
    <x-slot name="title">Características</x-slot>
    <form>
        <div class="row">
            <div class="form-group col-md-4">
                <x-form.label for="name">Nombre</x-form.label>
                <x-form.input wire:model="name" required maxlength="100" id="name"/>
                <x-form.input-error for="name"/>
            </div>
            <div class="form-group col-md-4">
                <x-form.label for="FieldName">Campo</x-form.label>
                <x-form.input wire:model="FieldName" required maxlength="100" id="FieldName"/>
                <x-form.input-error for="FieldName"/>
            </div>
            <div class="form-group col-md-4">
                <x-form.label for="Modelo">Modelo</x-form.label>
                <x-form.input wire:model="Modelo" required maxlength="100" id="Modelo"/>
                <x-form.input-error for="Modelo"/>
            </div>
        </div>
    </form>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>
</x-confirmation-modal>