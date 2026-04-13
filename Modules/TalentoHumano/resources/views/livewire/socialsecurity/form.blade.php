<x-confirmation-modal wire:model="showModalSocialSecurity" maxWidth="xl" modal="academic-info-detail-form-modal">
    <x-slot name="title">Gestión Seguridad Social</x-slot>
    <form>
        {{-- Novedades de Contrato --}}
        <fieldset class="fieldset-border">
            <legend class="legend-border">Novedades de Contrato</legend>
            <div class="row">
                <div class="form-group col-md-3 mb-0">
                    <x-form.label for="form.position">Cargo</x-form.label>
                    <x-form.input wire:model.defer="form.position" maxlength="100" id="form.position"/>
                    <x-form.input-error for="form.position"/>
                </div>
                <div class="form-group col-md-3 mb-0">
                    <x-form.label for="form.work_location">Ubicación Laboral</x-form.label>
                    <x-form.input wire:model.defer="form.work_location" maxlength="200" id="form.work_location"/>
                    <x-form.input-error for="form.work_location"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.contract_type">Tipo de Contrato</x-form.label>
                    <x-form.select wire:model.defer="form.contract_type" id="form.contract_type"
                         :options="$contractType" option-label="label" option-value="value" >
                    </x-form.select>
                    <x-form.input-error for="form.contract_type"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.salary">Salario</x-form.label>
                    <x-form.input wire:model.defer="form.salary" id="form.salary" />
                    <x-form.input-error for="form.salary"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.start_date">Fecha Inicio</x-form.label>
                    <x-form.input wire:model.defer="form.start_date" type="date" id="form.start_date"/>
                    <x-form.input-error for="form.start_date"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.end_date">Fecha Final</x-form.label>
                    <x-form.input wire:model.defer="form.end_date" type="date" id="form.end_date"/>
                    <x-form.input-error for="form.end_date"/>
                </div>
                <div class="form-group col-md-2 mt-2  mb-0">
                    <x-form.label for="form.destination">Centro Costos</x-form.label>
                    <x-form.input wire:model.defer="form.destination" maxlength="100" id="form.destination"/>
                    <x-form.input-error for="form.destination"/>
                </div>
                <div class="form-group col-md-2 mt-2  mb-0">
                    <x-form.label for="form.work_shift">Turno Trabajo</x-form.label>
                    <x-form.input wire:model.defer="form.work_shift" maxlength="100" id="form.work_shift"/>
                    <x-form.input-error for="form.work_shift"/>
                </div>
            </div>
        </fieldset>
        
        {{-- Seguridad Social --}}
        <fieldset class="fieldset-border mt-2">
            <legend class="legend-border">Seguridad Social</legend>
            <div class="row">
                <div class="form-group col-md-2 mt-2">
                    <x-form.label for="form.eps">EPS</x-form.label>
                    <x-form.input wire:model.defer="form.eps" maxlength="50" id="form.eps"/>
                    <x-form.input-error for="form.eps"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.afp">AFP</x-form.label>
                    <x-form.input wire:model.defer="form.afp" maxlength="50" id="form.afp"/>
                    <x-form.input-error for="form.afp"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.risk">ARL</x-form.label>
                    <x-form.input wire:model.defer="form.risk" maxlength="50" id="form.risk"/>
                    <x-form.input-error for="form.risk"/>
                </div>
            </div>
        </fieldset>

    </form>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>

</x-confirmation-modal>
