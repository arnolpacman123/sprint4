<?php

namespace App\Http\Livewire\Encuestas;

use App\Models\Encuesta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $open = false;
    public $titulo, $descripcion, $fecha_vigencia, $limite_respuestas;

    public function save()
    {
        Encuesta::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'fecha_vigencia' => $this->fecha_vigencia,
            'limite_respuestas' => (int)$this->limite_respuestas,
            'encuestador_id' => Auth::user()->_id,
        ]);
        $this->reset(['open', 'titulo', 'descripcion', 'fecha_vigencia']);
        $this->emitTo('encuestas.index', 'render');
        $this->emit('alert', ['Encuesta creada', 'La encuesta se creó satisfactoriamente']);
    }
    public function render()
    {
        return view('livewire.encuestas.create');
    }
}
