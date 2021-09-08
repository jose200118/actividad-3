<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jornada;

class CreateHorario extends Component
{
    public $open = true;
    public $tipojornada;

    protected $rules = [
        'tipojornada' => 'required',
    ];




    public function save(){

        $this->validate();

        jornada::create([
            'tipojornada' => $this->tipojornada
        ]);

        $this->reset(['open', 'tipojornada']);
        $this->emitTo('horarios','render');
        $this->emit ('alert',);
    }
    public function render()
    {
        return view('livewire.create-horario');
    }
}
