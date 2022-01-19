<?php

namespace App\Http\Livewire\Secciones;

use App\Models\Pregunta;
use App\Models\Seccion;
use Livewire\Component;

class Edit extends Component
{
    public $open = false;
    public $seccion;
    public $enunciado, $tipo_pregunta = '';

    protected $listeners = ['render' => 'render'];

    protected $rules = [
        'seccion.titulo' => 'required',
        'seccion.descripcion' => 'required',
    ];

    public function mount(Seccion $seccion)
    {
        $this->seccion = $seccion;
    }

    public function render()
    {
        $preguntas = $this->seccion->preguntas;
        return view('livewire.secciones.edit', compact('preguntas'));
    }

    public function submit()
    {

    }

    public function update()
    {
        $this->seccion->save();
        $this->emitTo('encuestas.show', 'render');
        $this->emit('alert', ['Sección actualizada', 'La sección se actualizó satisfactoriamente']);
    }
}
