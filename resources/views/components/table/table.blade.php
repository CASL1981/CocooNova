<div class="custom-table-effect table-responsive border rounded">
    <table class="table mb-0">
        <thead>
            <tr>
                <th class="p-0 align-middle text-center" scope="col">
                    <div class="form-check form-check-flat form-check-primary justify-content-center mx-auto" style="display: flex;">
                        <input type="checkbox" class="form-check-input border border-1 border-primary" wire:model.live="selectAll">
                    </div>
                </th>
                {{ $head }}
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>