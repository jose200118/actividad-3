<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jornada;

class Horarios extends Component
{
    public function render()
    {
        $jornadas = Jornada::all();
        return view('livewire.horarios', compact('jornadas'));
    }
}
