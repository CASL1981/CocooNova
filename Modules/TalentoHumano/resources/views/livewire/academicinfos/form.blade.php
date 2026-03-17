<x-confirmation-modal wire:model="showModalAcademic" maxWidth="xl" modal="academic-info-detail-form-modal">
    <x-slot name="title">Gestión de Información Academica</x-slot>
    <form>
        {{-- Empresa --}}
        <fieldset class="fieldset-border">
            <legend class="legend-border">Institución Educativa</legend>
            <div class="row">
                <div class="form-group col-md-3 mb-0">
                    <x-form.label for="form.academic_modality">Modalidad Académica <span class="text-danger">*</span></x-form.label>
                    <x-form.select wire:model.defer="form.academic_modality" id="form.academic_modality"
                        :options="['Presencial' => 'Presencial', 'Virtual' => 'Virtual', 'Semipresencial' => 'Semipresencial', 
                        'A distancia' => 'A distancia']">
                    </x-form.select>
                    <x-form.input-error for="form.academic_modality"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.graduate">Graduado</x-form.label>
                    <x-form.select wire:model.defer="form.graduate" id="form.graduate"
                         :options="['1' => 'Sí', '0' => 'No']">
                    </x-form.select>
                    <x-form.input-error for="form.graduate"/>
                </div>
                <div class="form-group col-md-3 mb-0">
                    <x-form.label for="form.degree_obtained">Titulo Obtenido</x-form.label>
                    <x-form.input wire:model.defer="form.degree_obtained" maxlength="200" id="form.degree_obtained"/>
                    <x-form.input-error for="form.degree_obtained"/>
                </div>
                <div class="form-group col-md-4 mt-2  mb-0">
                    <x-form.label for="form.educational_institution">Institución Educativa</x-form.label>
                    <x-form.input wire:model.defer="form.educational_institution" maxlength="200" id="form.educational_institution"/>
                    <x-form.input-error for="form.educational_institution"/>
                </div>
            </div>
        </fieldset>
        
        {{-- Tiempo de Servicio --}}
        <fieldset class="fieldset-border mt-2">
            <legend class="legend-border">Período</legend>
            <div class="row">
                <div class="form-group col-md-3 mt-2">
                    <x-form.label for="form.duration">Duración</x-form.label>
                    <x-form.input wire:model.defer="form.duration" maxlength="50" id="form.duration"/>
                    <x-form.input-error for="form.duration"/>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <x-form.label for="form.completion_date">Fecha Terminación</x-form.label>
                    <x-form.input wire:model.defer="form.completion_date" type="date" id="form.completion_date"/>
                    <x-form.input-error for="form.completion_date"/>
                </div>
                <div class="form-group col-md-3 mb-0">
                    <x-form.label for="form.professional_license">Tarjeta Profe.<span class="text-danger">*</span></x-form.label>
                    <x-form.input wire:model.defer="form.professional_license" maxlength="50" id="form.professional_license"/>
                    <x-form.input-error for="form.professional_license"/>
                </div>
            </div>
        </fieldset>

    </form>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>

</x-confirmation-modal>
