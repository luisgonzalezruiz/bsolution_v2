
@include('common.modalHead')

<div id="form">
    <div class="mb-3">
        <label for="name" class="form-label">Descripcion</label>
        <input type="text" wire:model.lazy="name" id="name" class="form-control" placeholder="Descripcion">
        @error('name')
            <span class="text-danger er">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Imagen</label>
        <input type="file" wire:model.lazy="image"
                id="image" class="form-control"
                accept="image/x-png, image/gif, image/jpeg">
    </div>
    @error('image')
        <span class="text-danger er">
            {{ $message }}
        </span>
    @enderror

</div>

@include('common.modalFooter')

