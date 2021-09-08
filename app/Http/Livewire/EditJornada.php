<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jornada;

class EditJornada extends Component
{
    public $jornada;
    public function mount(Jornada $jornada){
        $this->jornada = $jornada;
    }


    public function render()
    {
        return view('livewire.edit-jornada');
    }
}
