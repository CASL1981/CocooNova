<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center py-2">
        <div class="col-sm-12 col-md-4">
            <h5 class="card-title">{{ $tittle }}</h5>
        </div>
        <div class="col-sm-12 col-md-4">
            <label class="w-100">
                <input wire:model.live='keyWord' type="search" class="form-control p-2" placeholder="Buscar">
            </label>
        </div>
        <div class="btn-group btn-group-toggle btn-group-medium btn-group-edges">
            {{ $button }}
            @if (isset($exportable) || isset($audit))
            <div class="btn-group mx-0">
                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Exportable</a></li>
                    <li><a class="dropdown-item" href="#" wire:click="export('xlsx')" wire:loading.attr="disable">Excel</a></li>
                    <li><a class="dropdown-item" href="#" wire:click="export('xlsx')" wire:loading.attr="disable">CSV</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#" wire:click="auditoria" wire:loading.attr="disable">Auditoria</a></li>
                </ul>
            </div>
            @endif
        </div>
    </div>
    <div class="card-body py-1">
        <div class="row">
            {{ $slot}}
        </div>
        <div class="row mt-3">
            {{ $pagination }}
        </div>
    </div>
</div>