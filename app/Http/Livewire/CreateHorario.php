<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jornada;

class CreateHorario extends Component
{
    public $open = true;
    public $tipojornada;

    public function save(){
        jornada::create([
            'tipojornada' => $this->tipojornada
        ]);
    }
    public function render()
    {
        return view('livewire.create-horario');
    }
}
