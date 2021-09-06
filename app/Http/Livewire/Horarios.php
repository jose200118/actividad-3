<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jornada;

class Horarios extends Component
{

    public $search;


    public function render()
    {
        $jornadas = Jornada::where('tipojornada', 'like', '%' . $this->search . '%')->get();
        return view('livewire.horarios', compact('jornadas'));
    }
}
