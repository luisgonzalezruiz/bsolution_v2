<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;

use App\Models\Category;
use Livewire\WithFileUploads;

use Livewire\WithPagination;

use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Arr;
use LengthException;

use App\Events\CategoryCreated;

class Categories extends Component
{
    use WithFileUploads;
    use WithPagination;

    use AuthorizesRequests;

    protected $paginationTheme = 'bootstrap';

    public $name, $selected_id; //?Category $object;
    public $search;
    public $image;
    public $pageTitle;
    public $componentName;

    public $items=[];

    // para manejar notificacion
    public $showNewCategoryNotification = false;
    public $count=0;

    //escuchamos eventos emitidos desde la vista
    //'echo:category,CategoryCreated' => 'notifyNewCategory'
    protected $listeners = [
        'deleteRow' => 'destroy',
        'noty'=>'notifyNewCategory'
    ];


/*     public function getListeners(): array
    {
        //$authId = auth()->id();
        return [
            "echo:category" => 'notifyNewCategory',
        ];
    } */

    public function mount()
    {
        $this->pageTitle     = 'Listado';
        $this->componentName = 'Categorías';
        $this->pagination    = 5;
        $this->search        = '';
       // $this->object        = null;

        if (session()->has("items")) {
            $this->items = session("items");
        } else {
         /*
            $this->items =[
                    'nombre' => '',
                    'apellido'=> '',
                    'edad'=>0
             ]; */
        }

    }

    // limpiamos el buscador
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // de esta forma especificamos que queremos usar una paginacion personalizada
    //public function paginationView()
    //{
    //    return 'vendor.livewire.bootstrap';
    //}

    public function render()
    {
        // antes de renderizar, recuperamos el contenido de la session
        //$this->items = session("items");

        if (strlen($this->search)) {
            $categories = Category::where('name', 'like', '%'.$this->search.'%')
                ->orderBy('id', 'desc')->paginate($this->pagination);
        } else {
            $categories = Category::orderBy('id', 'desc')->paginate($this->pagination);
        }

        // lo que decimos aqui es: va a renderizar en la seccion content que esta en la plantilla
        // loyouts/theme y el archico app.blade.php
        return view('livewire.category.categories', compact('categories'))
                ->extends('layouts.theme.app')
                ->section('content');
    }

    public function addItem()
    {
        // aqui agregamos el item
        array_push($this->items,
                [
                    'nombre' => $this->name,
                    'apellido'=> $this->name . ' prueba final',
                    'edad'=>10
                ]);


        session()->put("items", $this->items);
        session()->save();


    }

    public function new()
    {
        /* $this->authorize('create', Role::class); */

        /* $this->object              = new Role(); */
        //$this->selectedPermissions = [];
        $this->emit('show-modal', 'show modal');
    }

    public function edit($id)
    {
        // de esta forma estamos especificando las columnas a recuperar, son buenas practicas
        // al no especificar, devuelve todas las filas
        $record = Category::find($id,['id','name','image']);
        $this->name = $record->name;
        $this->selected_id = $record->id;
        $this->image = null;

        //emitimos el evento show-modal
        $this->emit('show-modal','show modal!');
    }

    public function store()
    {


        $rules=[
            'name'=>'required|unique:categories|min:3'
        ];
        $messages = [
            'name.required' => 'Nombre es requerido',
            'name.unique' => 'Nombre ya existe',
            'name.min'=> 'Nombre debe tener minimo 3 digitos'
        ];

        // ejecutamos la validacion
        $this->validate($rules,$messages);

        // aqui insertamos el registro
        $category =Category::create([
                'name'=>$this->name
        ]);

        $customFileName = '';
        if ($this->image) {
            // unique() es una funcion de php que genera un string unico, milisegundos
            // $this->image->extension() image es una variable de tipo image que viene desde el from
            // y tiene un atributo extension
            $customFileName = uniqid() . '_.' . $this->image->extension();

            //$this->image->storeAs('public/categories',$customFileName);
            $url = Storage::put('categories', $this->image);

            // aqui actualizamos el registro con el path de la imagen
            $category->image = $url; //$customFileName;
            $category->save();
        }

        //*********************************************************************************
        // emitimos un evento, y esto sera capturado por un listener del lado del cliente
        //*********************************************************************************
        event(new CategoryCreated($category)); // fire the event
        //*********************************************************************************

        //emitimos el evento show-modal
        $this->emit('noty','Registro grabado!!!',4);
        //$this->emit('category-added','Categoria Registrada');


        $this->addItem();

        $this->resetUI();



    }

    public function update(){
        // tener en cuenta que al poner las reglas no debe haber espacio en blanco.
        $rules=[
            'name'=>"required|min:3|unique:categories,name,$this->selected_id "
        ];
        $messages = [
            'name.required' => 'Nombre es requerido',
            'name.unique' => 'Nombre ya existe',
            'name.min'=> 'Nombre debe tener minimo 3 digitos'
        ];
        $this->validate($rules,$messages);

        // aqui recuperamos el registro seleccionado
        $category = Category::find($this->selected_id);
        $category->update([
            'name'=> $this->name
        ]);
        // verificamos si se selecciono alguna imagen
        if ($this->image){
            $customFileName = uniqid() . '_.' . $this->image->extension();

            //$this->image->storeAs('public/categories',$customFileName);

            $url =  Storage::put('categories', $this->image);

            //extraemos la imagen anterior por que debemos eliminar fisicamente
            //por que vamos a almacenar uno nuevo
            $imageName = $category->image;
            $category->image = $url; //$customFileName;
            $category->save();

            //vemos si hay imagen anterior
            if($imageName != null){
                // note que consultamos la carpeta storage y no public
                //if(file_exists('storage/categories'. $imageName)){
                //    unlink('storage/categories'. $imageName);
                //}
                //if(file_exists($imageName)){
                    //unlink($imageName);
                    Storage::delete($imageName);
                //}


            }

        }

        $this->emit('category-updated','Categoria Actualizada');
        $this->resetUI();

    }

    public function resetUI(){
        $this->name = '';
        $this->selected_id  = 0;
        $this->image = null;
        $this->search = '';

        $this->emit('hide-modal', 'hide modal');
    }


    //public function destroy($id){
    public function destroy(Category $category){
        //$category = Category::find($id);
        $imageName = $category->image;
        $category->delete();

        //dd($imageName);

        if($imageName != null){
            //unlink('storage/categories/629527ad9dee3_.jpg');
            //Storage::disk('categories')->delete($imageName);
              Storage::delete($imageName);
        }

        $this->resetUI();
        $this->emit('category-deleted','Categoria Eliminada');

    }

    public function test(){
        $this->emit('category-deleted','Categoria Eliminada');
    }

    public function export()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }

    public function exportPDF()
    {
        //Recuperar todos los productos de la db
        $categories = Category::all();
        //dd($categories);
        //view()->share('categorias', $categorias);
        $pdf = pdf::loadView('pdf.reporte', compact('categories'));
        return $pdf->stream('salesReport.pdf');
        //return $pdf->download('archivo-pdf.pdf');

    }

    public function notifyNewCategory()
    {
        $this->showNewCategoryNotification = true;
        $this->count = $this->count + 1;
        //$this->emit('category-deleted','Categoria Eliminada');
    }




}
