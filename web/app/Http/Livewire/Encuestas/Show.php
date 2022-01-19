<?php

namespace App\Http\Livewire\Encuestas;

use App\Models\Encuesta;
use App\Models\Seccion;
use Livewire\Component;

class Show extends Component
{
    public $open = false;
    public $encuesta;
    public $titulo, $descripcion;

    protected $listeners = ['render' => 'render'];

    public function mount(Encuesta $encuesta)
    {
        $this->encuesta = $encuesta;
    }

    public function render()
    {
        $encuesta = $this->encuesta;
        $secciones = $encuesta->secciones;
        return view('livewire.encuestas.show', compact(['encuesta', 'secciones']));
    }

    public function addSeccion()
    {
        Seccion::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'encuesta_id' => $this->encuesta->_id,
        ]);
        $this->reset(['open', 'titulo', 'descripcion']);
        $this->emitTo('encuestas.show', 'render');
        $this->emit('alert', ['Sección agregada', 'La sección se agregó satisfactoriamente']);
    }
}
