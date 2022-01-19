<?php

namespace App\Http\Livewire\Opciones;

use App\Models\Opcion;
use Livewire\Component;
use App\Models\Pregunta;

class Create extends Component
{
    public $open = false;
    public $pregunta;
    public $valor;

    public function mount(Pregunta $pregunta)
    {
        $this->pregunta = $pregunta;
    }

    public function render()
    {
        return view('livewire.opciones.create');
    }

    public function saveOpcion()
    {
        Opcion::create([
            'valor' => $this->valor,
            'pregunta_id' => $this->pregunta->_id,
        ]);
        $this->reset(['open', 'valor']);
        $this->emitTo('secciones.edit', 'render');
        $this->emit('alert', ['Opción agregada', 'La opción se agregó satisfactoriamente']);
    }
}
