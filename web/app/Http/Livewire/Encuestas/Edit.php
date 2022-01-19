<?php

namespace App\Http\Livewire\Encuestas;

use App\Models\Encuesta;
use Livewire\Component;

class Edit extends Component
{
    public $open = false;
    public $encuesta;

    protected $rules = [
        'encuesta.titulo' => 'required',
        'encuesta.descripcion' => 'required',
        'encuesta.fecha_vigencia' => 'required',
        'encuesta.limite_respuestas' => 'required',
    ];

    public function mount(Encuesta $encuesta)
    {
        $this->encuesta = $encuesta;
    }

    public function render()
    {
        return view('livewire.encuestas.edit');
    }

    public function update()
    {
        $this->encuesta->limite_respuestas = (int) $this->encuesta->limite_respuestas;
        $this->encuesta->save();
        $this->reset(['open']);
        $this->emitTo('encuestas.index', 'render');
        $this->emit('alert', ['Encuesta actualizada', 'La encuesta se actualizó satisfactoriamente']);
    }
}
