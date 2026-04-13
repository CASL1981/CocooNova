@section('title', 'TH - Manage Contract')
<x-talentohumano::layouts.master>
    <div class="row">                  
       <div class="col-lg-12">
          <div class="card   rounded">
             <div class="card-body">
                <div class="row">
                   <div class="col-sm-12">    
                       <h3 class="mb-1">{{ $contract->full_name }}</h3>
                       <h4 class="mb-3">ID:  {{ $contract->identification }}</h4>
                   </div>
                </div>
                <div class="row">
                   <div class="col-lg-4">
                        <h5>Periodo:</h5>
                        <p class="mb-1"><b>Inicio:</b> {{ $contract->hiring_date }}</p>
                        <p class="mb-1"><b>Formato:</b> {{ $contract->format }}</p>
                   </div>
                   <div class="col-lg-3">
                        <h5>OBservaciones:</h5>
                        <p class="mb-1"><b>Observaciones:</b> {{ $contract->observations }}</p>
                   </div>
                   <div class="col-lg-2">
                        <h5>Lapso:</h5>
                        <p class="mb-1"><b>Mes:</b> {{ $contract->period }}</p>                        
                        <p class="mb-1"><b>Año:</b> {{ $contract->year }}</p>
                        
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
                        <a class="nav-link active" id="pills-social-security-tab-fill" data-bs-toggle="pill" href="#pills-social-security" role="tab" aria-selected="true">Seguridad Social</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab-fill" data-bs-toggle="pill" href="#pills-profile-fill" role="tab" aria-selected="false">Experiencia Laboral</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab-fill" data-bs-toggle="pill" href="#pills-contact-fill" role="tab" aria-selected="false">Seguridad Social</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="pills-evaluation-tab-fill" data-bs-toggle="pill" href="#pills-evaluation-fill" role="tab" aria-selected="false">Evaluaciones</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-demographic-data-tab-fill" data-bs-toggle="pill" href="#pills-demographic-data-fill" role="tab" aria-selected="false">Datos Demográficos</a>
                    </li> --}}
                </ul>
                <div class="tab-content" id="pills-tabContent-1">
                    <div class="tab-pane fade show active" id="pills-social-security" role="tabpanel" aria-labelledby="pills-social-security-tab-fill">
                        <livewire:talentohumano.social-security :contractId="$contract->id"/>
                    </div>
                    {{-- <div class="tab-pane fade" id="pills-profile-fill" role="tabpanel" aria-labelledby="pills-profile-tab-fill">
                        <livewire:talentohumano.work-experiences :employeeId="$contract->id"/>
                    </div>
                    <div class="tab-pane fade" id="pills-contact-fill" role="tabpanel" aria-labelledby="pills-contact-tab-fill">
                        <livewire:talentohumano.academic-infos :employeeId="$contract->id"/>
                    </div>
                    <div class="tab-pane fade" id="pills-evaluation-fill" role="tabpanel" aria-labelledby="pills-evaluation-tab-fill">
                        <livewire:talentohumano.evaluations :employeeId="$contract->id"/>
                    </div>
                    <div class="tab-pane fade" id="pills-demographic-data-fill" role="tabpanel" aria-labelledby="pills-demographic-data-tab-fill">
                        <livewire:talentohumano.demographic-data :employeeId="$contract->id"/>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-talentohumano::layouts.master>