

                <div class="text-end">
                    @if ($selected_id < 1)
                        <button wire:click.prevent="store()" class="btn btn-success waves-effect waves-light">Insertar</button>
                    @else
                        <button wire:click.prevent="update()"  class="btn btn-success waves-effect waves-light">Actualizar</button>
                    @endif
                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Cerrar</button>                </div>

            </div> {{-- END modal-body p-4 --}}

        </div> {{-- END modal-content --}}

    </div> {{-- END modal-dialog modal-dialog-centered --}}

</div> {{-- END modal --}}
