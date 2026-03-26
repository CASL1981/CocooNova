<x-confirmation-modal wire:model="show" maxWidth="xl" modal="evaluation-detail-form-modal">
    <x-slot name="title">Gestión de Contratos</x-slot>
    <form>
        {{-- Empresa --}}
        <fieldset class="fieldset-border">
            <legend class="legend-border">Identificación y Ubicación</legend>
            <div class="row">
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.full_name">Nombre Completo</x-form.label>
                    <x-form.input wire:model.defer="form.full_name" type="text" id="form.full_name"/>
                    <x-form.input-error for="form.full_name"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.identification">Identificación</x-form.label>
                    <x-form.input wire:model.defer="form.identification" id="form.identification"/>
                    <x-form.input-error for="form.identification"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.hiring_date">Fecha Contratación</x-form.label>
                    <x-form.input wire:model.defer="form.hiring_date" type="date" id="form.hiring_date"/>
                    <x-form.input-error for="form.hiring_date"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.termination_date">Fecha Terminación</x-form.label>
                    <x-form.input wire:model.defer="form.termination_date" type="date" id="form.termination_date"/>
                    <x-form.input-error for="form.termination_date"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.destination">Centro de Costo</x-form.label>
                    <x-form.input wire:model.defer="form.destination" id="form.destination"/>
                    <x-form.input-error for="form.destination"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.city">Ciudad</x-form.label>
                    <x-form.input wire:model.defer="form.city" id="form.city"/>
                    <x-form.input-error for="form.city"/>
                </div>
            </div>
        </fieldset>
        <fieldset class="fieldset-border">
            <legend class="legend-border">Basicos</legend>
            <div class="row">
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.type">Tipo Contrato</x-form.label>
                    <x-form.input wire:model.defer="form.type" id="form.type" />
                    <x-form.input-error for="form.type"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.probationary_period">Periodo Prueba</x-form.label>
                    <x-form.input wire:model.defer="form.probationary_period" id="form.probationary_period" />
                    <x-form.input-error for="form.probationary_period"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.salary">Salario</x-form.label>
                    <x-form.input wire:model.defer="form.salary" id="form.salary" />
                    <x-form.input-error for="form.salary"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.work_schedule">Horario Trabajo</x-form.label>
                    <x-form.input wire:model.defer="form.work_schedule" id="form.work_schedule" />
                    <x-form.input-error for="form.work_schedule"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.reason_leaving">Motivo Retiro</x-form.label>
                    <x-form.input wire:model.defer="form.reason_leaving" id="form.reason_leaving" />
                    <x-form.input-error for="form.reason_leaving"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.format">Formato</x-form.label>
                    <x-form.input wire:model.defer="form.format" id="form.format" />
                    <x-form.input-error for="form.format"/>
                </div>
                <div class="form-group col-md-12 mb-0">
                    <x-form.label for="form.observations">Observaciones</x-form.label>
                    <x-form.input wire:model.defer="form.observations" id="form.observations" />
                    <x-form.input-error for="form.observations"/>
                </div>
            </div>
        </fieldset>
    </form>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>

</x-confirmation-modal>
