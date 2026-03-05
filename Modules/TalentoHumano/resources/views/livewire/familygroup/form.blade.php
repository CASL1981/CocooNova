<x-confirmation-modal wire:model="show" maxWidth="xl">
    <x-slot name="title">Gestion de grupos familiares</x-slot>
    <form>
        <fieldset class="fieldset-border">
            <legend class="legend-border">Identificación</legend>
            <div class="row">                
                <div class="form-group col-md-2">
                    <x-form.label for="form.identification">Identificación</x-form.label>
                    <x-form.input wire:model="form.identification" maxlength="10" id="form.identification"/>
                    <x-form.input-error for="form.identification"/>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="form.name">Nombres</x-form.label>
                    <x-form.input wire:model.defer="form.name" maxlength="100" id="form.name"/>
                    <x-form.input-error for="form.name"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.kinship">Parentesco</x-form.label>
                    <x-form.input wire:model.defer="form.kinship" maxlength="100" id="form.kinship"/>
                    <x-form.input-error for="form.kinship"/>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="form.profession">Profesión</x-form.label>
                    <x-form.input wire:model="form.profession" maxlength="100" id="form.profession"/>
                    <x-form.input-error for="form.profession"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.birth_date">Fecha de Nacimiento</x-form.label>
                    <x-form.input wire:model="form.birth_date" type="date" id="form.birth_date"/>
                    <x-form.input-error for="form.birth_date"/>
                </div>
            </div>
        </fieldset>
        <fieldset class="fieldset-border mt-2">
            <legend class="legend-border">Profesión</legend>
            <div class="row">
                <div class="form-group col-md-2">
                    <x-form.label for="form.occupation">Ocupación</x-form.label>
                    <x-form.input wire:model="form.occupation" maxlength="100" id="form.occupation"/>
                    <x-form.input-error for="form.occupation"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.company">Empresa</x-form.label>
                    <x-form.input wire:model="form.company" maxlength="100" id="form.company"/>
                    <x-form.input-error for="form.company"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.education_level">Nivel Educativo</x-form.label>
                    <x-form.input wire:model="form.education_level" maxlength="100" id="form.education_level"/>
                    <x-form.input-error for="form.education_level"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.phone">Telefono</x-form.label>
                    <x-form.input wire:model="form.phone" maxlength="20" id="form.phone"/>
                    <x-form.input-error for="form.phone"/>
                </div>
            </div>
        </fieldset>
        <fieldset class="fieldset-border mt-2">
            <legend class="legend-border">Salud</legend>
            <div class="row">
                <div class="form-group col-md-12">
                    <x-form.label for="form.illness">Enfermedades</x-form.label>
                    <x-form.input wire:model="form.illness" maxlength="255" id="form.illness"/>
                    <x-form.input-error for="form.illness"/>
                </div>
            </div>
        </fieldset>
    </form>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>
</x-confirmation-modal>