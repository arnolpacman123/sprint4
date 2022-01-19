<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Secciones extends Component
{
    public $encuesta;
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

    public function mount($encuesta)
    {
        $this->encuesta = $encuesta;
        $this->counter = 0;
        $this->size = 1; //default value
    }

    public function render()
    {
        return view('livewire.secciones');
    }
}
