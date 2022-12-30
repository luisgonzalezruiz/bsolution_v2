<div  class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">{{ $componentName }} | {{ $selected_id > 0 ? 'EDITAR': 'CREAR' }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body p-4">

                <div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Descripcion</label>
                        <input wire:model="name" type="text" class="form-control"  placeholder="Enter company name">
                    </div>

                </div>

            </div>

            <div class="modal-footer bg-light">
                <button type="submit" wire:click.prevent="store()" class="btn btn-success waves-effect waves-light">Save</button>
                <button type="button" wire:click="test()" class="btn btn-success waves-effect waves-light">test</button>
                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Continue</button>
            </div>

        </div>
    </div>
</div>


{{-- @include('common.modalHead')
<div>
    <div class="input-group">
        <div class="mb-3">
            <label for="name" class="form-label">Descripcion</label>
            <input type="text" wire:model.lazy="name" class="form-control" id="name" placeholder="Descripcion">
        </div>
    </div>
    @error('name')
        <span class="text-danger er">
            {{ $message }}
        </span>
    @enderror

    <div class="form-group custom-file">
        <input
            type="file"
            class="custom-file-input form-control"
            wire:model="image"
            accept="image/x-png, image/gif, image/jpeg"
        >
        <label class="custom-file-label">
            Imágen {{ $image ?? ($image ?? '') }}
        </label>

        @error('image')
            <span class="text-danger er">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>
@include('common.modalFooter') --}}

