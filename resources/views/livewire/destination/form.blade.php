


<x-confirmation-modal wire:model="show" maxWidth="lg">
    <x-slot name="title">Centros de Costos</x-slot>
    <form>
        <div class="row">
            <div class="form-group col-md-2">
                <x-form.label for="costcenter">Centro Costo</x-form.label>
                <x-form.input wire:model="costcenter" required maxlength="20" id="costcenter"/>
                <x-form.input-error for="costcenter"/>
            </div>
            <div class="form-group col-md-4">
                <x-form.label for="name">Descripción</x-form.label>
                <x-form.input wire:model="name" required maxlength="192" id="name"/>
                <x-form.input-error for="name"/>
            </div>
            <div class="form-group col-md-4">
                <x-form.label for="address">Dirección</x-form.label>
                <x-form.input wire:model="address" maxlength="254" id="address"/>
                <x-form.input-error for="address"/>
            </div>
            <div class="form-group col-md-2">
                <x-form.label for="phone">Telefono</x-form.label>
                <x-form.input wire:model="phone" maxlength="20" id="phone"/>
                <x-form.input-error for="phone"/>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <x-form.label for="location">Ubicación</x-form.label>
                <x-form.input wire:model.defer="location" maxlength="20" id="location"/>
                <x-form.input-error for="location"/>
            </div>
            <div class="form-group col-md-2">
                <x-form.label for="minimun">Minimo</x-form.label>
                <x-form.input wire:model.defer="minimun" type="number" id="minimun"/>
                <x-form.input-error for="minimun"/>
            </div>
            <div class="form-group col-md-2">
                <x-form.label for="maximun">Maximo</x-form.label>
                <x-form.input wire:model.defer="maximun" type="number" id="" id="maximun"/>
                <x-form.input-error for="maximun"></x-form.input-error>
            </div>
            <div class="form-group col-md-2">
                <x-form.label for="status">Estado</x-form.label>
                <x-form.select wire:model.defer="status" :options="['1' => 'Activo', '0' => 'Inactivo']"></x-select>
                <x-form.input-error for="status"></x-form.input-error>
            </div>
        </div>
    </form>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>
</x-confirmation-modal>