
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                        <li class="breadcrumb-item active">Sellers</li>
                    </ol>
                </div>
                <h4 class="page-title">Categorías {{ $count }}</h4>


{{--                 @foreach($items as $item)
                    <input wire:model="items.{{$loop->index}}.nombre" type="text"/>
                    <label >{{$item['apellido']}}</label>
                    <label >{{$item['edad']}}</label>
                @endforeach --}}


            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row justify-content-between mb-2">
                        <div class="col-auto">
                            <div class="d-flex flex-wrap align-items-center">
                                <label for="status-select" class="me-2">Filtrar</label>
                                <div class="me-sm-3">
                                    <select class="form-select my-1 my-md-0" id="status-select">
                                        <option selected="">All</option>
                                        <option value="1">Id</option>
                                        <option value="2">Descripcion</option>
                                    </select>
                                </div>

                                @include('common.searchBox')

                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="text-lg-end">
                                <button class="btn btn-danger waves-effect waves-light mb-2 me-2"
                                    data-bs-toggle="modal" data-bs-target="#theModal">
                                    <i class="mdi mdi-plus-circle me-1"></i> Add New
                                </button>
                                <button wire:click.prevent="export()" class="btn btn-light waves-effect mb-2" >to Excel</button>
                                <button wire:click.prevent="exportPDF()" class="btn btn-light waves-effect mb-2" >to PDF</button>
                                <a href="{{ route('test') }}" target="_blank" class="btn btn-light waves-effect mb-2" >Categorias</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sm table-centered table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Descripcion</th>
                                    <th>Imagen</th>
                                    <th style="width: 125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="text-body fw-bold">
                                            {{ $category->id }}
                                        </td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td class="table-user">
                                            <span>
                                                <img src="{{Storage::url($category->imagen)}}"
                                                    alt="imagen de ejemplo" class="me-2 rounded-circle">
                                            </span>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    {{ $categories->links() }}

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <!-- Muy importante que este dentro de este div por que sino no funciona -->
    @include('livewire.category.form')

</div>

@push('scripts')

<script>




document.addEventListener('DOMContentLoaded', function(){
/*
    //************************************************************
    // de esta manera emitimos un evento mediante pusher
    //************************************************************

    Pusher.logToConsole = true;
    var pusher = new Pusher('2e7c67c07475dd8c71f0', {
        cluster: 'us2',
        forceTLS:true
    });

    var channel = pusher.subscribe('category-channel');
    channel.bind('category-event', function(data) {
        //app.messages.push(JSON.stringify(data));
        alert(JSON.stringify(data));
        //invocamos a un listener que esta en el componente con nombre noty y esta llama a un metodo
        //que aumenta la cantidad
        //var x=document.getElementById("info").innerHTML;
        //document.getElementById("info").innerHTML = 15;
        //window.livewire.emit('info')
    });
*/

    //************************************************************



    // escuchamos el evento que viene del backend
    window.livewire.on('show-modal',msg =>{
        console.log(msg)
        // de esta forma llamamos a la funcion que esta por afuera
        test()
        $('#theModal').modal('show')
    });

    window.livewire.on('category-added',msg =>{
        console.log(msg);

        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: msg,
            showConfirmButton: false,
            timer: 1500
        })

        //$('#theModal').modal('hide')
    });

    window.livewire.on('category-updated',msg =>{
        $('#theModal').modal('hide')
    });
    window.livewire.on('category-deleted',msg =>{
        console.log('Registro eliminado')
    });

});

function test(){
    console.log("prueba");
}

function confirm(id, products){

    if(products > 0){
        Swal.fire('No se puede eliminar la categoria por que tiene producto relacionado')
        return;
    }

    swal({
        title: 'Está seguro?',
        text: 'Confirmas eliminar el registro',
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor:'#d33',
        confirmButtonColor:'#3085d6',
        confirmButtonText:'Aceptar'
    }).then(function(result){
        if (result.isConfirmed) {
            window.livewire.emit('deleteRow',id)

            //aqui en lugar del sweet alert podemos usar el toast

            Swal.fire(
                'Eliminado!',
                'El registro ha sido eliminado.',
                'success'
            )

        }

    })

}
</script>

@endpush
