<?php

namespace App\Http\Livewire\Preguntas;

use App\Models\Pregunta;
use App\Models\Seccion;
use Livewire\Component;

class Create extends Component
{
    public $open = false;
    public $seccion;
    public $enunciado, $tipo_pregunta = '', $tipo_seleccion = '', $tipo_entrada = '';

    public function mount(Seccion $seccion)
    {
        $this->seccion = $seccion;
    }

    public function render()
    {
        return view('livewire.preguntas.create');
    }

    public function savePregunta()
    {
        if ($this->tipo_pregunta !== 'CERRADA') {
            $this->tipo_seleccion = '';
        }
        if ($this->tipo_pregunta !== 'ABIERTA') {
            $this->tipo_entrada = '';
        }
        Pregunta::create([
            'enunciado' => $this->enunciado,
            'tipo_pregunta' => $this->tipo_pregunta,
            'tipo_seleccion' => $this->tipo_seleccion,
            'tipo_entrada' => $this->tipo_entrada,
            'seccion_id' => $this->seccion->_id,
        ]);
        $this->reset(['open', 'enunciado', 'tipo_pregunta', 'tipo_seleccion', 'tipo_entrada']);
        $this->emitTo('secciones.edit', 'render');
        $this->emit('alert', ['Pregunta agregada', 'La pregunta se agregó satisfactoriamente']);
    }
}
