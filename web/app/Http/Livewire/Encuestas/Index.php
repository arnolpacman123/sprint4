<?php

namespace App\Http\Livewire\Encuestas;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $sort = 'titulo';
    public $direction = 'asc';

    protected $listeners = ['render' => 'render'];

    public function render()
    {
        if ($this->search === '') {
            $encuestas = Auth::user()->encuestas()->orderBy('created_at', 'desc')->get();

        } else {
            $encuestas = Auth::user()->encuestas()->orWhere('titulo', 'like', '%'. $this->search . '%')
                ->orWhere('descripcion', 'like', '%'. $this->search . '%')
                ->orWhere('fecha_vigencia', 'like', '%'. $this->search . '%')->orderBy('created_at', 'desc')->get();
        }
        return view('livewire.encuestas.index', compact('encuestas'));
    }

    public function order($sort)
    {
        if ($this->sort === $sort) {
            if ($this->direction === 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
