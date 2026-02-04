<x-confirmation-modal wire:model="show" maxWidth="xl">
    <x-slot name="title">Gestion de empleado</x-slot>
    <form>
        <fieldset class="fieldset-border">
            <legend class="legend-border">Identificación</legend>
            <div class="row">
                <div class="form-group col-md-2">
                    <x-form.label for="form.type_document">Identificación</x-form.label>
                    <x-form.select wire:model="form.type_document" class="form-control-sm" id="form.type_document"
                    :options="['CC' => 'CC', 'CE' => 'CE', 'TI' => 'TI', 'RC' => 'RC', 'PAS' => 'PAS']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.type_document"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.identification">Identificación</x-form.label>
                    <x-form.input wire:model="form.identification" maxlength="10" type="number" id="form.identification"/>
                    <x-form.input-error for="form.identification"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.expedition_department">Dep. Expedición</x-form.label>
                    <x-form.select wire:model="form.expedition_department" class="form-control-sm" id="form.expedition_department"
                    :options="['Cordoba' => 'Cordoba', 'Antioquia' => 'Antioquia', 'Bogota' => 'Bogota']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.expedition_department"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.expedition_city">Ciud. Expedición</x-form.label>
                    <x-form.select wire:model="form.expedition_city" class="form-control-sm" id="form.expedition_city"
                    :options="['Monteria' => 'Monteria', 'Cerete' => 'Cerete', 'Planeta Rica' => 'Planeta Rica']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.expedition_city"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.first_name">Nombres</x-form.label>
                    <x-form.input wire:model.defer="form.first_name" maxlength="100" id="form.first_name"/>
                    <x-form.input-error for="form.first_name"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.last_name">Apellidos</x-form.label>
                    <x-form.input wire:model.defer="form.last_name" maxlength="100" id="form.last_name"/>
                    <x-form.input-error for="form.last_name"/>
                </div>
            </div>
        </fieldset>
        <fieldset class="fieldset-border mt-2">
            <legend class="legend-border">Ubicación y Contacto</legend>
            <div class="row">
                <div class="form-group col-md-3">
                    <x-form.label for="form.email">Email</x-form.label>
                    <x-form.input wire:model="form.email" maxlength="100" id="form.email"/>
                    <x-form.input-error for="form.email"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.type_housing">Tipo Vivienda</x-form.label>
                    <x-form.select wire:model="form.type_housing" class="form-control-sm" id="form.type_housing"
                    :options="['Propia' => 'Propia', 'Familiar' => 'Familiar', 'Arrendada' => 'Arrendada', 'Pensionado' => 'Pensionado']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.type_housing"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.address">Dirección</x-form.label>
                    <x-form.input wire:model="form.address" maxlength="100" id="form.address"/>
                    <x-form.input-error for="form.address"/>
                </div>
                <div class="form-group col-md-1">
                    <x-form.label for="form.estrato">Estrato</x-form.label>
                    <x-form.select wire:model="form.estrato" class="form-control-sm" id="form.estrato"
                    :options="['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.estrato"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.department">Departamento</x-form.label>
                    <x-form.select wire:model="form.department" class="form-control-sm" id="form.department"
                    :options="['Cordoba' => 'Cordoba', 'Antioquia' => 'Antioquia', 'Bogota' => 'Bogota']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.department"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.city">Ciudad</x-form.label>
                    <x-form.select wire:model="form.city" class="form-control-sm" id="form.city"
                    :options="['Monteria' => 'Monteria', 'Cerete' => 'Cerete', 'Planeta Rica' => 'Planeta Rica']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.city"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.cel_phone">Celular</x-form.label>
                    <x-form.input wire:model="form.cel_phone" maxlength="20" id="form.cel_phone"/>
                    <x-form.input-error for="form.cel_phone"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.cel_phone2">Tel. Contacto</x-form.label>
                    <x-form.input wire:model="form.cel_phone2" maxlength="20" id="form.cel_phone2"/>
                    <x-form.input-error for="form.cel_phone2"/>
                </div>
            </div>
        </fieldset>
        <fieldset class="fieldset-border mt-2">
            <legend class="legend-border">Datos Demográficos y Servicio Militar</legend>
            <div class="row">
                <div class="form-group col-md-2">
                    <x-form.label for="form.gender">Genero</x-form.label>
                    <x-form.select wire:model="form.gender" class="form-control-sm" id="form.gender"
                    :options="['M' => 'Masculino', 'F' => 'Femenino', 'O' => 'Otro']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.gender"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.birth_date">Fecha de Nacimiento</x-form.label>
                    <x-form.input wire:model="form.birth_date" type="date" id="form.birth_date"/>
                    <x-form.input-error for="form.birth_date"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.department_birth">Dep. Nacimiento</x-form.label>
                    <x-form.select wire:model="form.department_birth" class="form-control-sm" id="form.department_birth"
                    :options="['Cordoba' => 'Cordoba', 'Antioquia' => 'Antioquia', 'Bogota' => 'Bogota']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.department_birth"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.city_birth">Ciud. Nacimiento</x-form.label>
                    <x-form.select wire:model="form.city_birth" class="form-control-sm" id="form.city_birth"
                    :options="['Monteria' => 'Monteria', 'Cerete' => 'Cerete', 'Planeta Rica' => 'Planeta Rica']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.city_birth"/>
                </div>
                <div class="form-group col-md-1">
                    <x-form.label for="form.blood_type">T. Sangre</x-form.label>
                    <x-form.select wire:model="form.blood_type" class="form-control-sm" id="form.blood_type"
                    :options="['A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.blood_type"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.marital_status">Estado Civil</x-form.label>
                    <x-form.select wire:model="form.marital_status" class="form-control-sm" id="form.marital_status"
                    :options="['S' => 'Soltero', 'C' => 'Casado', 'D' => 'Divorciado', 'V' => 'Viudo']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.marital_status"/>
                </div>                
                <div class="form-group col-md-1">
                    <x-form.label for="form.number_children">Hijos</x-form.label>
                    <x-form.input wire:model="form.number_children" type="number" id="form.number_children"/>
                    <x-form.input-error for="form.number_children"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.military_service">Libreta Militar</x-form.label>
                    <x-form.input wire:model="form.military_service" type="text" maxlength="20" id="form.military_service"/>
                    <x-form.input-error for="form.military_service"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.type_militart">Tipo de Libreta</x-form.label>
                    <x-form.select wire:model="form.type_militart" class="form-control-sm" id="form.type_militart"
                    :options="['Primera clase' => 'Primera clase', 'Segunda clase' => 'Segunda clase', 'Tercera clase' => 'Tercera clase']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.type_militart"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.district">Distrito</x-form.label>
                    <x-form.input wire:model="form.district" type="text" maxlength="50" id="form.district"/>
                    <x-form.input-error for="form.district"/>
                </div>
            </div>
        </fieldset>
        <fieldset class="fieldset-border mt-2">
            <legend class="legend-border">Contrato</legend>
            <div class="row">                
                <div class="form-group col-md-2">
                    <x-form.label for="form.position">Cargo</x-form.label>
                    <x-form.input wire:model="form.position" type="text" maxlength="100" id="form.position"/>
                    <x-form.input-error for="form.position"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.area">Area</x-form.label>
                    <x-form.select wire:model="form.area" class="form-control-sm" id="form.area"
                    :options="['Comercial y Mercadeo' => 'Comercial y Mercadeo', 'Operaciones logisticas' => 'Operaciones logisticas', 'Administrativo y Financiera' => 'Administrativo y Financiera']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.area"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="form.destination_id">Centro de Operación</x-form.label>
                    <x-form.select wire:model="form.destination_id" class="form-control-sm" id="form.destination_id"
                    :options="['1' => '1', '1000' => '1000', '1100' => '1100']" placeholder="Seleccione..."/>
                    <x-form.input-error for="form.destination_id"/>
                </div>
                <div class="form-group col-md-1">
                    <x-form.label for="form.vendedor">Vendedor</x-form.label>
                    <x-form.input-switch wire:model="form.vendedor" id="form.vendedor"/>
                    <x-form.input-error for="form.vendedor"/>
                </div>
                <div class="form-group col-md-1">
                    <x-form.label for="form.auditor">Auditor</x-form.label>
                    <x-form.input-switch wire:model="form.auditor" id="form.auditor"/>
                    <x-form.input-error for="form.auditor"/>
                </div>
                <div class="form-group col-md-1">
                    <x-form.label for="form.approve">Autoriza</x-form.label>
                    <x-form.input-switch wire:model="form.approve" id="form.approve"/>
                    <x-form.input-error for="form.approve"/>
                </div>
            </div>
        </fieldset>
    </form>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>
</x-confirmation-modal>