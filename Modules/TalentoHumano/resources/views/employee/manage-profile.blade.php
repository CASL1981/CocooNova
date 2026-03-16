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
                       <h3 class="mb-1">{{ $employee->fullName }}</h3>
                       <h4 class="mb-3">ID:  {{ $employee->identification }}</h4>                              
                   </div>
                </div>
                <div class="row">
                   <div class="col-lg-4">
                        <h5>Contacto:</h5>
                        <p class="mb-1"><b>Email:</b> {{ $employee->email }}</p>
                        <p class="mb-1"><b>Dirección:</b> {{ $employee->address }}</p>
                        <p class="mb-1"><b>Tipo Vivienda:</b> {{ $employee->type_housing }}; <b>Estrato:</b> {{ $employee->estrato }}</p>
                        <p class="mb-1"><b>Telefono:</b> {{ $employee->cel_phone }}; <b>Contacto Emergencia:</b> {{ $employee->cel_phone2 }}</p>
                   </div>
                   <div class="col-lg-3">
                        <h5>Demografico:</h5>
                        <p class="mb-1"><b>Genero:</b> {{ $employee->gender }}</p>
                        <p class="mb-1"><b>F. Nacimiento:</b> {{ $employee->birth_date }}</p>
                        <p class="mb-1"><b>Departamento:</b> {{ $employee->department }}; Ciudad: {{ $employee->city }}</p>
                        <p class="mb-1"><b>Tipo Sangre:</b> {{ $employee->blood_type }}; Estado Civil: {{ $employee->marital_status }}; <b># Hijos:</b> {{ $employee->number_children }}</p>
                   </div>
                   <div class="col-lg-2">
                        <h5>Servicio Militar:</h5>
                        <p class="mb-1"><b># Libreta:</b> {{ $employee->military_service }}</p>                        
                        <p class="mb-1"><b>Tipo Libreta:</b> {{ $employee->type_military }}; <b>Distrito:</b> {{ $employee->district }}</p>
                        
                   </div>
                   <div class="col-lg-3">
                        <h5>Laboral:</h5>
                        <p class="mb-1"><b>Cargo:</b> {{ $employee->position }}</p>
                        <p class="mb-1"><b>Area:</b> {{ $employee->area }}</p>
                        <p class="mb-1"><b>Centro </b>de Costo: {{ $employee->destination_id }};</p>
                        <p class="mb-1"><b>Vendedor:</b> {{ $employee->vendedor ? 'Si' : 'No' }}; <b>Auditor:</b> {{ $employee->auditor ? 'Si' : 'No' }}; Autoriza: {{ $employee->approve ? 'Si' : 'No' }}</p>
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
                    <a class="nav-link active" id="pills-home-tab-fill" data-bs-toggle="pill" href="#pills-family-fill" role="tab" aria-selected="true">Grupo Familiar</a>
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
                <div class="tab-pane fade show active" id="pills-family-fill" role="tabpanel" aria-labelledby="pills-home-tab-fill">
                    <livewire:talentohumano.family-group :employeeId="$employee->id"/>
                </div>
                <div class="tab-pane fade" id="pills-profile-fill" role="tabpanel" aria-labelledby="pills-profile-tab-fill">
                    <livewire:talentohumano.work-experiences :employeeId="$employee->id"/>
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