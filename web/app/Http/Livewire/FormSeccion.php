<?php

namespace App\Http\Livewire;

use App\Models\Seccion;
use Livewire\Component;

class FormSeccion extends Component
{
    public $encuesta;
    public $i;
    public $seccion;
    public $titulo;
    public $descripcion;
    public $mostrar;
    public $create;

    public function mount($i, $encuesta, $seccion = null)
    {
        $this->create = true;
        $this->i = $i;
        $this->mostrar = true;
        $this->encuesta = $encuesta;
        $this->seccion = $seccion;
        $this->titulo = "";
        $this->descripcion = "";
        if (!is_null($seccion)) {
            $this->create = false;
            $this->titulo = $this->seccion->titulo;
            $this->descripcion = $this->seccion->descripcion;
        }
    }

    public function create()
    {
        $this->seccion = new Seccion();
        $this->seccion = $this->seccion->create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'encuesta_id' => $this->encuesta->_id,
        ]);
        $this->mostrar = false;
    }

    public function update()
    {
        $this->seccion->update([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
        ]);
    }

    public function render()
    {
        return view('livewire.form-seccion');
    }
}
