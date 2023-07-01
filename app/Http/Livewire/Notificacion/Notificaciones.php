<?php

namespace App\Http\Livewire\Notificacion;

use Livewire\Component;

class Notificaciones extends Component
{

    public $count=0;

    // de esta forma activamos el listener y es llamado de un componente con el metodo
    //
    protected $listeners = [
        'infoGlobal'=>'notifyNewCategory'
    ];


    public function render()
    {
        return view('livewire.notificacion.notificaciones');
    }

    public function notifyNewCategory($data)
    {
        $this->count = $this->count + 1;
    }

}
