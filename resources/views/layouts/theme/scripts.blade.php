{{-- <script src="{{ asset('theme/js/loader.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" crossorigin="anonymous" defer></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous" defer></script>
 --}}


{{--
<script src="{{ asset('theme/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}" defer></script>
<script src="{{ asset('theme/js/app.js') }}" defer></script>
<script src="{{ asset('theme/js/custom.js') }}" defer></script>
<script src="{{ asset('theme/plugins/sweetalerts/sweetalert2.min.js') }}" defer></script>
<script src="{{ asset('theme/plugins/notification/snackbar/snackbar.min.js') }}" defer></script>
<script src="{{ asset('theme/plugins/nicescroll/nicescroll.js') }}" defer></script>
<script src="{{ asset('theme/plugins/currency/currency.js') }}" defer></script>
<script src="{{ asset('vendor/dmauro-Keypress/keypress-2.1.5.min.js') }}" defer></script>
<script src="{{ asset('vendor/onscan/onscan.min.js') }}" defer></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr" defer></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script> --}}





<!-- Vendor js -->
<script src={{ asset("ubold/assets/js/vendor.min.js") }}></script>

<!-- third party js -->
<script src={{ asset("ubold/assets/libs/datatables.net/js/jquery.dataTables.min.js") }}></script>
<script src={{ asset("ubold/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js") }}></script>
<script src={{ asset("ubold/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js") }}></script>
<script src={{ asset("ubold/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js") }}></script>
<script src={{ asset("ubold/assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js") }}></script>
<!-- third party js ends -->


<!-- Sweet Alerts js -->
<script src={{ asset("ubold/assets/libs/sweetalert2/sweetalert2.all.min.js") }}></script>

<!-- Tost-->
<script src={{ asset("ubold/assets/libs/jquery-toast-plugin/jquery.toast.min.js") }}></script>



<!-- Select2 js-->
<script src={{ asset("ubold/assets/libs/select2/js/select2.min.js") }}></script>
<!-- Dropzone file uploads-->
<script src={{ asset("ubold/assets/libs/dropzone/min/dropzone.min.js") }}></script>

<!-- Quill js -->
<script src={{ asset("ubold/assets/libs/quill/quill.min.js") }}></script>

<!-- Init js-->
<script src={{ asset("ubold/assets/js/pages/form-fileuploads.init.js") }}></script>


<!-- Init js -->
<script src={{ asset("ubold/assets/js/pages/add-product.init.js")}}></script>


{{-- <!-- Bootstrap Tables js -->
<script src={{ asset("ubold/assets/libs/bootstrap-table/bootstrap-table.min.js")}}></script>

<!-- Init js -->
<script src={{ asset("ubold/assets/js/pages/bootstrap-tables.init.js")}}></script> --}}



<!-- App js -->
<script src={{ asset("ubold/assets/js/app.min.js") }}></script>


{{-- este es del mixin --}}
<script src="{{ mix('js/app.js') }}"></script>
{{-- <script src="{{ asset('/js/app.js') }}"></script> --}}


{{-- <script src="https://js.pusher.com/6.0/pusher.min.js"></script> --}}
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>


{{-- aqui se incrustaran los scripts especificos de cada componente --}}
@stack('scripts')



<script>
/*
    Pusher.logToConsole = true;

    var pusher = new Pusher('2e7c67c07475dd8c71f0', {
      cluster: 'us2'
    });

    var channel = pusher.subscribe('category');
    channel.bind('CategoryCreated', function(data) {
        //app.messages.push(JSON.stringify(data));
        console.log(data);
    });
*/

</script>

<script>

/*
    function initNiceScroll() {

        $('.tblscroll').niceScroll({
            cursorcolor: "#515365",
            cursorwidth: "15px",
            background: "rgba(20,20,20,0.3)",
            cursorborder: "0px",
            cursorborderradius: 7
        });
    }
*/
    function initOnScan() {
        try {
            onScan.attachTo(document, {
                suffixKeyCodes: [13],
                onScan: function(barcode) {
                    window.livewire.emit('scanCode', barcode);
                },
                onScanError: function(e){
                    console.log(e);
                }
            });

            console.log('Scaner ready!');
        } catch(e) {
            console.log(e);
        }
    }

    function initPosKeypress() {

        console.log('llegue al metodo initPosKeypress 1')

        var listener = new window.keypress.Listener();

        listener.simple_combo("f9", function() {
            window.livewire.emit('saveSale');
        });

        listener.simple_combo("f8", function() {
            var input = document.getElementById('cash');
            input.value = '';
            input.focus();
        });

        listener.simple_combo("f4", function() {
            var value = parseInt(document.getElementById('hiddenTotal').value, 10);
            if (value > 0) {
                Confirm('clearCart', '', '??CONFIRMAS CANCELAR LA COMPRA?');
            } else {
                noty('AGREGA PRODUCTOS A LA VENTA.', 2);
            }
        });

    }

    function initFlatpickr() {
        flatpickr(document.getElementsByClassName('flatpickr'), {
            enableTime: false,
            dateFormat: 'd-m-Y',
            locale: 'es'
        });
    }

    // este funcion lo usaremos globalmente para mostrar los mensajes
    // es una libreria javascrips que definimos mas arriba
    function noty(msg, option=1) {

        // aqui podemos enviar un parametro opcion
        // opcion: 1=>Info, 2=>Warning, 3=>error, 4=>Success
/*         var icono;
        var heading;
        switch (option) {
            case 1:
                icono = 'info'
                heading='Info'
                break;
            case 2:
                icono = 'warning'
                heading='Warning'
                break;
            case 3:
                icono = 'error'
                heading='Error'
                break;
            case 4:
                icono = 'success'
                heading='Success'
                break;
            default:
                break;
        } */

        // 'top-left', 'bottom-center', 'bottom-right', 'bottom-left'
        $.toast({
            heading: 'Informaci??n',
            text: msg,
            icon: 'info',
            loader: true,        // Change it to false to disable loader
            //loaderBg: '#9EC600',  // To change the background
            showHideTransition: 'slide',
            position: 'top-right'
        })

    }

    document.addEventListener('DOMContentLoaded', function () {
        window.livewire.on('noty', msg => {
            noty(msg)
        });

        window.livewire.on('error', msg => {
            noty(msg, 2)
        });

        window.livewire.on('hide-modal', msg => {
            $('#theModal').modal('hide');
        });

        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show');
        });

        window.livewire.on('print-ticket', saleId => {
            window.open('print://' + saleId, '_blank');
        });

        console.log('llegue')



    })

</script>


