@section('title', 'TH - Manage Profile')
<x-talentohumano::layouts.master>
    {{-- <livewire:talentohumano.employees /> --}}
    {{-- @php
        dd($employee);
    @endphp --}}
    <div class="row">                  
       <div class="col-lg-12">
          <div class="card   rounded">
             <div class="card-body">
                <div class="row">
                   <div class="col-sm-12">    
                      <h4 class="mb-3">ID:  {{ $employee->identification }}</h4>                              
                      <h3 class="mb-5">{{ $employee->fullName }}</h3>
                   </div>
                </div>
                <div class="row">
                   <div class="col-lg-4">
                        <h5>Contacto:</h5>
                        <p class="mb-1"><h5>Email:</h5> {{ $employee->email }}</p>
                        <p class="mb-1"><h5>Dirección:</h5> {{ $employee->address }}</p>
                        <p class="mb-1"><h5>Tipo </h5>vivienda: {{ $employee->type_housing }}; Estrato: {{ $employee->estrato }}</p>
                        <p class="mb-1"><h5>Telefono:</h5> {{ $employee->cel_phone }}; Contacto Emergencia: {{ $employee->cel_phone2 }}</p>
                   </div>
                   <div class="col-lg-3">
                        <h5>Demografico:</h5>
                        <p class="mb-1"><h5>Genero:</h5> {{ $employee->gender }}</p>
                        <p class="mb-1"><h5>F.</h5> Nacimiento: {{ $employee->birth_date }}</p>
                        <p class="mb-1"><h5>Departamento:</h5> {{ $employee->department }}; Ciudad: {{ $employee->city }}</p>
                        <p class="mb-1"><h5>Tipo </h5>Sangre: {{ $employee->blood_type }}; Estado Civil: {{ $employee->marital_status }}; # Hijos: {{ $employee->number_children }}  </p>
                   </div>
                   <div class="col-lg-2">
                        <h5>Servicio Militar:</h5>
                        <p class="mb-1"><h5># </h5>Libreta: {{ $employee->military_service }}</p>                        
                        <p class="mb-1"><h5>Tipo </h5>Libreta: {{ $employee->type_military }}; Distrito: {{ $employee->district }}</p>
                        
                   </div>
                   <div class="col-lg-3">
                        <h5>Laboral:</h5>
                        <p class="mb-1"><h5>Cargo:</h5> {{ $employee->position }}</p>
                        <p class="mb-1"><h5>Area:</h5> {{ $employee->area }}</p>
                        <p class="mb-1"><h5>Centro </h5>de Costo: {{ $employee->destination_id }};</p>
                        <p class="mb-1"><h5>Vendedor:</h5> {{ $employee->vendedor ? 'Si' : 'No' }}; Auditor: {{ $employee->auditor ? 'Si' : 'No' }}; Autoriza: {{ $employee->approve ? 'Si' : 'No' }}  </p>
                   </div>
                </div>
             </div>
          </div>
       </div>                                    
    </div>
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab-fill" data-bs-toggle="pill" href="#pills-home-fill" role="tab" aria-selected="true">Grupo Familiar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab-fill" data-bs-toggle="pill" href="#pills-profile-fill" role="tab" aria-selected="false">Experiencia Laboral</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab-fill" data-bs-toggle="pill" href="#pills-contact-fill" role="tab" aria-selected="false">Información Academica</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-evaluation-tab-fill" data-bs-toggle="pill" href="#pills-evaluation-fill" role="tab" aria-selected="false">Evaluaciones</a>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent-1">
                <div class="tab-pane fade show active" id="pills-home-fill" role="tabpanel" aria-labelledby="pills-home-tab-fill">
                    <p>Grupo familiar del empleado.</p>
                </div>
                <div class="tab-pane fade" id="pills-profile-fill" role="tabpanel" aria-labelledby="pills-profile-tab-fill">
                    <p>Experiencia laboral del empleado.</p>
                </div>
                <div class="tab-pane fade" id="pills-contact-fill" role="tabpanel" aria-labelledby="pills-contact-tab-fill">
                    <p>Información academica</p>
                </div>
                <div class="tab-pane fade" id="pills-evaluation-fill" role="tabpanel" aria-labelledby="pills-evaluation-tab-fill">
                    <p>Evaluaciones del empleado.</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-talentohumano::layouts.master>