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
                <h4 class="page-title">Sellers</h4>
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
                            {{-- <form class="search-bar position-relative mb-sm-0 mb-2">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="mdi mdi-magnify"></span>
                            </form> --}}
                            @include('common.searchBox')
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end">
                                <button type="button" class="btn btn-danger waves-effect waves-light mb-2 me-2"><i class="mdi mdi-basket me-1"></i> Add Sellers</button>
                                <button type="button" class="btn btn-success waves-effect waves-light mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Descripcion</th>
                                    <th>Imagen</th>
                                    <th style="width: 82px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
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
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <ul class="pagination pagination-rounded justify-content-end my-2">
                        <li class="page-item">
                            <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </li>
                    </ul>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div>

<script>
document.addEventListener('DOMContentLoaded', function(){

    // escuchamos el evento que viene del backend
    window.livewire.on('show-modal',msg =>{
        //console.log(msg)
        // de esta forma llamamos a la funcion que esta por afuera
        //test()
        $('#theModal').modal('show')
    });

    window.livewire.on('category-added',msg =>{
        $('#theModal').modal('hide')
    });

    window.livewire.on('category-updated',msg =>{
        $('#theModal').modal('hide')
    });
    window.livewire.on('category-deleted',msg =>{
        console.log('Registro eliminado')
    });

});

function confirm(id, products){

    if(products > 0){
        swal('No se puede eliminar la categoria por que tiene producto relacionado')
        return;
    }

    swal({
        title: 'CONFIRMAR',
        text: 'Confirmas eliminar el registro',
        type: 'warning',
        showCancelButton: 'Cerrar',
        cancelButtonColor:'#fff',
        confirmButtonColor:'#3b3f5c',
        confirmButtonText:'Aceptar'
    }).then(function(result){
        if(result.value){
            // este delete row lo definimos en el componente en un listener
            window.livewire.emit('deleteRow',id)
            swal.close()
        }
    })

}


</script>
