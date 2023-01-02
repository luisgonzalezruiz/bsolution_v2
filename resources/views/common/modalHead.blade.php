<div wire:ignore.self  class="modal fade"  id="theModal"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">{{ $componentName }} | {{ $selected_id > 0 ? 'EDITAR': 'CREAR' }}</h4>

                <h6 class="text-left text-warning" wire:loading >POR FAVOR ESPERE</h6>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body p-4">
