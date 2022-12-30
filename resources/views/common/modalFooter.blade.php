
            <div class="modal-footer bg-light">
                @if ($selected_id < 1)
                    <button wire:click.prevent="store()" type="button" class="btn btn-success waves-effect waves-light">Insertar</button>
                @else
                    <button wire:click.prevent="update()" type="button" class="btn btn-success waves-effect waves-light">Actualizar</button>
                @endif
                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
