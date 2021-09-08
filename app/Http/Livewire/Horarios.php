<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jornada;

class Horarios extends Component
{

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render'];

    public function render()
    {
        $jornadas = Jornada::where('tipojornada', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->get();
        return view('livewire.horarios', compact('jornadas'));
    }

    public function order($sort){

        if ($this->sort == $sort) {

            if ($this->direction == 'desc') {
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
