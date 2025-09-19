@props(['id', 'maxWidth', 'audit'])

@php
$id = $id ?? md5($attributes->wire('model'));

$maxWidth = [
    'sm' => ' modal-sm',
    'md' => '',
    'lg' => ' modal-lg',
    'xl' => ' modal-xl',
][$maxWidth ?? 'md'];
@endphp

<!-- Modal -->
<div
    x-data="{
        showauditor: @entangle($attributes->wire('model')),
    }"
    x-init="() => {

        let el = document.querySelector('#modal-id-{{ $id }}')

        let modal = new bootstrap.Modal(el);

        $watch('showauditor', value => {
            if (value) {
                modal.show()
            } else {
                modal.hide()
            }
        });

        el.addEventListener('hide.bs.modal', function (event) {
          showauditor = false;
        })

        $('#modal-id-{{ $id }}').on('hidden.bs.modal', function() {
            Livewire.dispatch('showaudit');
          })
    }"
    wire:ignore.self
    class="modal fade"
    tabindex="-1"
    id="modal-id-{{ $id }}"
    aria-labelledby="modal-id-{{ $id }}"
    aria-hidden="true"
    x-ref="modal-id-{{ $id }}">

    <div class="modal-dialog{{ $maxWidth }}">
        <div class="modal-content">
            <div class="modal-header p-3 bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Información Para Auditoria</h5>
            </div>
            <div class="modal-body p-0">
                <div class="card mb-0 pt-1">
                    <div class="card-body py-1">
                        <div class="card text-white bg-info mb-2">
                            <h4 class="card-header text-white bg-info">Creado</h4>
                            <div class="card-body">
                                <p class="card-text">Usuario: {{$audit["creator"]["email"] ?? ''}}</p>
                                <p class="card-text">Fecha: {{ $audit["created_at"] ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-1">
                        <div class="card text-white bg-success mb-2">
                            <h4 class="card-header text-white bg-success">Modificado</h4>
                            <div class="card-body">
                                <p class="card-text">Usuario: {{$audit["editor"]["email"] ?? ''}}</p>
                                <p class="card-text">Fecha: {{$audit["updated_at"] ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-1">
                        <div class="card text-white bg-warning mb-2">
                            <h4 class="card-header text-white bg-warning ">Eliminado</h4>
                            <div class="card-body">
                                <p class="card-text">Usuario: {{$audit["destroyer"]["email"] ?? ''}}</p>
                                <p class="card-text">Fecha: {{$audit["deleted_at"] ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>