<x-confirmation-modal wire:model="showModalEvaluation" maxWidth="xl" modal="evaluation-detail-form-modal">
    <x-slot name="title">Gestión de Evaluaciones</x-slot>
    <form>
        {{-- Empresa --}}
        <fieldset class="fieldset-border">
            <legend class="legend-border">Resultados</legend>
            <div class="row">
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.type">Tipo Evaluación</x-form.label>
                    <x-form.select wire:model.defer="form.type" id="form.type"
                    :options="['Anual' => 'Anual', 'Periodica' => 'Periodica', 'Proceso' => 'Proceso']">
                </x-form.select>
                <x-form.input-error for="form.type"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.start_date">Fecha Inicial</x-form.label>
                    <x-form.input wire:model.defer="form.start_date" type="date" id="form.start_date"/>
                    <x-form.input-error for="form.start_date"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.end_date">Fecha Final</x-form.label>
                    <x-form.input wire:model.defer="form.end_date" type="date" id="form.end_date"/>
                    <x-form.input-error for="form.end_date"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.date">Fecha Evaluación</x-form.label>
                    <x-form.input wire:model.defer="form.date" type="date" id="form.date"/>
                    <x-form.input-error for="form.date"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.result">Resultado</x-form.label>
                    <x-form.input wire:model.defer="form.result" id="form.result" type="number" step="0.1" min="1" max="5"/>
                    <x-form.input-error for="form.result"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.interpretation">Interpretación <span class="text-danger">*</span></x-form.label>
                    <x-form.select wire:model.defer="form.interpretation" id="form.interpretation"
                        :options="['Critica' => 'Critica', 'Aceptable' => 'Aceptable', 'Satisfactorio' => 'Satisfactorio']">
                    </x-form.select>
                    <x-form.input-error for="form.interpretation"/>
                </div>
            </div>
        </fieldset>
    </form>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>

</x-confirmation-modal>
