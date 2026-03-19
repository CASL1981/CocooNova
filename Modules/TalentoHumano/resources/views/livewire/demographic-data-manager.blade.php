{{-- resources/views/livewire/datos-demograficos.blade.php --}}
<div class="card"><div class="collapse show" id="datosDemograficos">
        <div class="card-body">
            <div class="row g-4">

                {{-- ¿Persona expuesta políticamente? --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label small fw-medium">¿Persona expuesta políticamente?</label>
                    <div class="btn-group w-100" role="group">
                        <input type="radio" class="btn-check" 
                               name="personaExpuestaPoliticamente" 
                               id="pep_no" 
                               value="0" 
                               wire:model.live="politically_exposed"
                               {{ $politically_exposed == 0 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-start-pill" for="pep_no">No</label>

                        <input type="radio" class="btn-check" 
                               name="personaExpuestaPoliticamente" 
                               id="pep_si" 
                               value="1" 
                               wire:model.live="politically_exposed"
                               {{ $politically_exposed == 1 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-end-pill" for="pep_si">Si</label>
                    </div>
                </div>

                {{-- ¿Administra recursos públicos? --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label small fw-medium">¿Administra recursos públicos?</label>
                    <div class="btn-group w-100" role="group">
                        <input type="radio" class="btn-check" 
                               name="administraRecursosPublicos" 
                               id="arp_no" 
                               value="0" 
                               wire:model.live="public_resources"
                               {{ $public_resources == 0 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-start-pill" for="arp_no">No</label>

                        <input type="radio" class="btn-check" 
                               name="administraRecursosPublicos" 
                               id="arp_si" 
                               value="1" 
                               wire:model.live="public_resources"
                               {{ $public_resources == 1 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-end-pill" for="arp_si">Si</label>
                    </div>
                </div>

                {{-- ¿Pertenece al grupo de protección especial constitucional? --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label small fw-medium">¿Pertenece al grupo de protección especial constitucional?</label>
                    <div class="btn-group d-flex" role="group">
                        <input type="radio" class="btn-check" 
                                wire:model="special_protection"
                                name="proteccionEspecialConstitucional" 
                                id="pec_no" 
                                value="0" 
                                {{ $special_protection == 0 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-start-pill" for="pec_no">No</label>

                        <input type="radio" class="btn-check"
                                wire:model="special_protection"
                                name="proteccionEspecialConstitucional" 
                                id="pec_si" 
                                value="1" 
                                {{ $special_protection == 1 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-end-pill" for="pec_si">Si</label>
                    </div>
                </div>

                {{-- ¿Persona mayores de 60 años? --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label small fw-medium">¿Persona mayores de 60 años?</label>
                    <div class="btn-group d-flex" role="group">
                        <input type="radio" class="btn-check" 
                                wire:model="elderly_person"
                                name="mayoresSesenta" 
                                id="ms_no" 
                                value="0" 
                                {{ $elderly_person == 0 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-start-pill" for="ms_no">No</label>

                        <input type="radio" class="btn-check" 
                                wire:model="elderly_person"
                                name="mayoresSesenta" 
                                id="ms_si" 
                                value="1" 
                                {{ $elderly_person == 1 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-end-pill" for="ms_si">Si</label>
                    </div>
                </div>

                {{-- ¿Pertenece al grupo de personas con discapacidad física? --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label small fw-medium">¿Pertenece al grupo de personas con discapacidad física?</label>
                    <div class="btn-group d-flex" role="group">
                        <input type="radio" class="btn-check" 
                                wire:model="disabled_person"
                                name="discapacidadFisica" 
                                id="df_no" 
                                value="0" 
                                {{ $disabled_person == 0 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-start-pill" for="df_no">No</label>

                        <input type="radio" class="btn-check" 
                                wire:model="disabled_person"
                                name="discapacidadFisica" 
                                id="df_si" 
                                value="1" 
                                {{ $disabled_person == 1 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-end-pill" for="df_si">Si</label>
                    </div>
                </div>

                {{-- ¿Personas víctimas del conflicto armado? --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label small fw-medium">¿Personas víctimas del conflicto armado?</label>
                    <div class="btn-group d-flex" role="group">
                        <input type="radio" class="btn-check" 
                                wire:model="victims_conflict"
                                name="victimasConflictoArmado" 
                                id="vca_no" 
                                value="0" 
                                {{ $victims_conflict == 0 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-start-pill" for="vca_no">No</label>

                        <input type="radio" class="btn-check" 
                                wire:model="victims_conflict"
                                name="victimasConflictoArmado" 
                                id="vca_si" 
                                value="1" 
                                {{ $victims_conflict == 1 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-end-pill" for="vca_si">Si</label>
                    </div>
                </div>

                {{-- ¿Personas en condición de pobreza extrema? --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label small fw-medium">¿Personas en condición de pobreza extrema?</label>
                    <div class="btn-group d-flex" role="group">
                        <input type="radio" class="btn-check" 
                                wire:model="extreme_poverty"
                                name="pobrezaExtrema" 
                                id="pe_no" 
                                value="0" 
                                {{ $extreme_poverty == 0 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-start-pill" for="pe_no">No</label>

                        <input type="radio" class="btn-check" 
                                wire:model="extreme_poverty"
                                name="pobrezaExtrema" 
                                id="pe_si" 
                                value="1" 
                                {{ $extreme_poverty == 1 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-end-pill" for="pe_si">Si</label>
                    </div>
                </div>

                {{-- ¿Pertenece al grupo de población indígena? --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label small fw-medium">¿Pertenece al grupo de población indígena?</label>
                    <div class="btn-group d-flex" role="group">
                        <input type="radio" class="btn-check" 
                                wire:model="indigenous_person"
                                name="poblacionIndigena" 
                                id="pi_no" 
                                value="0" 
                                {{ $indigenous_person == 0 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-start-pill" for="pi_no">No</label>

                        <input type="radio" class="btn-check" 
                                wire:model="indigenous_person"
                                name="poblacionIndigena" 
                                id="pi_si" 
                                value="1" 
                                {{ $indigenous_person == 1 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-end-pill" for="pi_si">Si</label>
                    </div>
                </div>

                {{-- ¿Pertenece al grupo de población afro? --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label small fw-medium">¿Pertenece al grupo de población afro?</label>
                    <div class="btn-group d-flex" role="group">
                        <input type="radio" class="btn-check" 
                                wire:model="afro_population"
                                name="poblacionAfro" 
                                id="pa_no" 
                                value="0" 
                                {{ $afro_population == 0 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-start-pill" for="pa_no">No</label>

                        <input type="radio" class="btn-check" 
                                wire:model="afro_population"
                                name="poblacionAfro" 
                                id="pa_si" 
                                value="1" 
                                {{ $afro_population == 1 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-end-pill" for="pa_si">Si</label>
                    </div>
                </div>

                {{-- ¿Pertenece al grupo de población diversa LGBTIQ+? --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label small fw-medium">¿Pertenece al grupo de población diversa LGBTIQ+?</label>
                    <div class="btn-group d-flex" role="group">
                        <input type="radio" class="btn-check" 
                                wire:model="diverse_population"
                                name="poblacionDiversa" 
                                id="lg_no" 
                                value="0" 
                                {{ $diverse_population == 0 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-start-pill" for="lg_no">No</label>

                        <input type="radio" class="btn-check" 
                                wire:model="diverse_population"
                                name="poblacionDiversa" 
                                id="lg_si" 
                                value="1" 
                                {{ $diverse_population == 1 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-end-pill" for="lg_si">Si</label>
                    </div>
                </div>

                {{-- ¿Pertenece a otro grupo de protección especial constitucional? --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label small fw-medium">¿Pertenece a otro grupo de protección especial constitucional?</label>
                    <div class="btn-group d-flex" role="group">
                        <input type="radio" class="btn-check" 
                                wire:model="other_protection"
                                name="otroGrupoProteccion" 
                                id="ogp_no" 
                                value="0" 
                                {{ $other_protection == 0 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-start-pill" for="ogp_no">No</label>

                        <input type="radio" class="btn-check" 
                                wire:model="other_protection"
                                name="otroGrupoProteccion" 
                                id="ogp_si" 
                                value="1" 
                                {{ $other_protection == 1 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm flex-fill rounded-end-pill" for="ogp_si">Si</label>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <br>
                    <button type="button" class="btn btn-primary m-2" wire:click.prevent="update()">Actualizar</button>
                </div>

            </div>{{-- end row --}}
        </div>{{-- end card-body --}}
    </div>{{-- end collapse --}}
</div>{{-- end card --}}     
