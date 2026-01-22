<x-confirmation-modal wire:model="showModal" maxWidth="lg" modal="characteristic-detail-form-modal">
    <x:slot name="title">Detalle de Característica</x:slot>
    <!--begin::Form-->
    <form>
        <div class="row mb-7">
            <div class="form-group col-md-4">
                <x-form.label for="name" value="{{ __('Nombre') }}" />
                <x-form.input type="text" wire:model="name" class="form-control-sm" maxlength="100" title="Debe tener máximo 100 dígitos"></x-form.input>
                <x-form.input-error for="name" class="mt-2"/>
            </div>
            <div class="form-group col-md-4">
                <x-form.label for="abbreviation" value="{{ __('Abreviatura') }}" />
                <x-form.input type="text" wire:model="abbreviation" class="form-control-sm" maxlength="10"></x-form.input>
                <x-form.input-error for="abbreviation" class="mt-2"/>
            </div>
            <div class="form-group col-md-2">
                <x-form.label for="code" value="{{ __('Código') }}" />
                <x-form.input type="text" wire:model="code" class="form-control-sm" maxlength="50"></x-form.input>
                <x-form.input-error for="code" class="mt-2"/>
            </div>
            <div class="form-group col-md-2">
                <x-form.label for="value" value="{{ __('Valor') }}" />
                <x-form.input type="number" step="0.01" wire:model="value" class="form-control-sm"></x-form.input>
                <x-form.input-error for="value" class="mt-2"/>
            </div>
        </div>
        <div class="row mb-7">
            <div class="form-group col-md-2">
                <x-form.label for="percentage" value="{{ __('Porcentaje') }}" />
                <x-form.input type="number" step="0.01" max="100" wire:model="percentage" class="form-control-sm"></x-form.input>
                <x-form.input-error for="percentage" class="mt-2"/>
            </div>
            <div class="form-group col-md-2">
                <x-form.label for="max" value="{{ __('Máximo') }}" />
                <x-form.input type="number" step="0.01" wire:model="max" class="form-control-sm"></x-form.input>
                <x-form.input-error for="max" class="mt-2"/>
            </div>
            <div class="form-group col-md-2">
                <x-form.label for="min" value="{{ __('Mínimo') }}" />
                <x-form.input type="number" step="0.01" wire:model="min" class="form-control-sm"></x-form.input>
                <x-form.input-error for="min" class="mt-2"/>
            </div>
            <div class="form-group col-md-2">
                <x-form.label for="stock" value="{{ __('Stock') }}" />
                <x-form.input type="number" step="0.01" wire:model="stock" class="form-control-sm"></x-form.input>
                <x-form.input-error for="stock" class="mt-2"/>
            </div>            
        </div>
    </form>
    <!--end::Form-->
    <x:slot name="footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="method()">Guardar</button>
    </x:slot>
</x-confirmation-modal>