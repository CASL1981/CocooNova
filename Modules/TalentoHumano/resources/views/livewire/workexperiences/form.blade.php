<x-confirmation-modal wire:model="showModal" maxWidth="xl" modal="work-experience-detail-form-modal">
    <x-slot name="title">Gestión de Experiencia Laboral</x-slot>
    <form>
        {{-- Empresa --}}
        <fieldset class="fieldset-border">
            <legend class="legend-border">Empresa</legend>
            <div class="row">
                <div class="form-group col-md-4 mb-0">
                    <x-form.label for="form.company">Empresa <span class="text-danger">*</span></x-form.label>
                    <x-form.input wire:model.defer="form.company" maxlength="200" id="form.company"/>
                    <x-form.input-error for="form.company"/>
                </div>
                <div class="form-group col-md-4 mb-0">
                    <x-form.label for="form.nature">Naturaleza</x-form.label>
                    <x-form.input wire:model.defer="form.nature" maxlength="150" id="form.nature"/>
                    <x-form.input-error for="form.nature"/>
                </div>
                <div class="form-group col-md-4 mb-0">
                    <x-form.label for="form.city">Ciudad</x-form.label>
                    <x-form.input wire:model.defer="form.city" maxlength="100" id="form.city"/>
                    <x-form.input-error for="form.city"/>
                </div>
                <div class="form-group col-md-3 mt-2  mb-0">
                    <x-form.label for="form.phone">Teléfono</x-form.label>
                    <x-form.input wire:model.defer="form.phone" maxlength="30" id="form.phone"/>
                    <x-form.input-error for="form.phone"/>
                </div>
                <div class="form-group col-md-3 mt-2  mb-0">
                    <x-form.label for="form.contract_type">Tipo de Contrato</x-form.label>
                    <x-form.input wire:model.defer="form.contract_type" maxlength="100" id="form.contract_type"/>
                    <x-form.input-error for="form.contract_type"/>
                </div>
                <div class="form-group col-md-3 mt-2">
                    <x-form.label for="form.salary">Salario</x-form.label>
                    <x-form.input wire:model.defer="form.salary" type="number" step="0.01" min="0" id="form.salary"/>
                    <x-form.input-error for="form.salary"/>
                </div>
            </div>
        </fieldset>

        {{-- Cargo --}}
        <fieldset class="fieldset-border mt-2">
            <legend class="legend-border">Cargo</legend>
            <div class="row">
                <div class="form-group col-md-6 mb-0">
                    <x-form.label for="form.position">Cargo <span class="text-danger">*</span></x-form.label>
                    <x-form.input wire:model.defer="form.position" maxlength="150" id="form.position"/>
                    <x-form.input-error for="form.position"/>
                </div>
                <div class="form-group col-md-6 mb-0">
                    <x-form.label for="form.immediate_supervisor">Jefe Inmediato</x-form.label>
                    <x-form.input wire:model.defer="form.immediate_supervisor" maxlength="150" id="form.immediate_supervisor"/>
                    <x-form.input-error for="form.immediate_supervisor"/>
                </div>
                <div class="form-group col-md-12 mt-2  mb-0">
                    <x-form.label for="form.main_duties">Funciones Principales</x-form.label>
                    <textarea wire:model.defer="form.main_duties"
                        class="form-control form-control-sm shadow-none mb-3"
                        id="form.main_duties" rows="3"></textarea>
                    <x-form.input-error for="form.main_duties"/>
                </div>
            </div>
        </fieldset>

        {{-- Tiempo de Servicio --}}
        <fieldset class="fieldset-border mt-2">
            <legend class="legend-border">Período</legend>
            <div class="row">
                <div class="form-group col-md-3 mb-0">
                    <x-form.label for="form.start_date">Fecha de Inicio <span class="text-danger">*</span></x-form.label>
                    <x-form.input wire:model.defer="form.start_date" type="date" id="form.start_date"/>
                    <x-form.input-error for="form.start_date"/>
                </div>
                <div class="form-group col-md-3 mb-0">
                    <x-form.label for="form.end_date">Fecha de Fin</x-form.label>
                    <x-form.input wire:model.defer="form.end_date" type="date" id="form.end_date"/>
                    <x-form.input-error for="form.end_date"/>
                </div>
                <div class="form-group col-md-3 mb-0">
                    <x-form.label for="form.time_service">Tiempo de Servicio</x-form.label>
                    <x-form.input wire:model.defer="form.time_service" maxlength="50" id="form.time_service"/>
                    <x-form.input-error for="form.time_service"/>
                </div>
                <div class="form-group col-md-12 mt-2  mb-0">
                    <x-form.label for="form.reason_for_leaving">Motivo de Retiro</x-form.label>
                    <textarea wire:model.defer="form.reason_for_leaving"
                        class="form-control form-control-sm shadow-none mb-3"
                        id="form.reason_for_leaving" rows="2"></textarea>
                    <x-form.input-error for="form.reason_for_leaving"/>
                </div>
            </div>
        </fieldset>

    </form>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>

</x-confirmation-modal>
