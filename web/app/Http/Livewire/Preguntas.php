<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Preguntas extends Component
{
    public $seccion;
    public $counter;
    public $size;

    public function increment()
    {
        $this->counter += $this->size;
    }

    public function decrement()
    {
        $this->counter -= $this->size;
    }

    public function mount($seccion)
    {
        $this->seccion = $seccion;
        $this->counter = 0;
        $this->size = 1; //default value
    }

    public function render()
    {
        return view('livewire.preguntas');
    }
}
