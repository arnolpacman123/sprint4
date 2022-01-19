<?php

namespace App\Http\Livewire;

use App\Models\Pregunta;
use Livewire\Component;

class FormPregunta extends Component
{
    public $seccion;
    public $i;
    public $pregunta;
    public $enunciado;
    public $tipo;
    public $mostrar;
    public $create;

    public function mount($i, $seccion, $pregunta = null)
    {
        $this->create = true;
        $this->i = $i;
        $this->mostrar = true;
        $this->seccion = $seccion;
        $this->pregunta = $pregunta;
        $this->enunciado = "";
        $this->tipo = "";
        if (!is_null($pregunta)) {
            $this->create = false;
            $this->enunciado = $this->pregunta->enunciado;
            $this->tipo = $this->pregunta->tipo;
        }
    }

    public function create()
    {
        $this->pregunta = new Pregunta();
        $this->pregunta = $this->pregunta->create([
            'enunciado' => $this->enunciado,
            'tipo' => $this->tipo,
            'seccion_id' => $this->seccion->_id,
        ]);
        $this->mostrar = false;
    }

    public function update()
    {
        $this->pregunta->update([
            'enunciado' => $this->enunciado,
            'tipo' => $this->tipo,
        ]);
    }

    public function render()
    {
        return view('livewire.form-pregunta');
    }
}
