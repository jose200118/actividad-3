<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jornada;

class Horarios extends Component
{

    public $search,$tipojornada, $jornada;
    public $sort = 'id';
    public $direction = 'desc';
    public $open_save = false;
    public $open_edit = false;
    protected $rules = [
        'tipojornada' => 'required',
        'jornada.tipojornada' => 'required',
    ];
    protected $listeners = ['render'];



    public function save(Jornada $tipojornada){
        $this->jornada = $tipojornada;
        $this->open_save = true;

        $this->validate();
        jornada::create([
            'tipojornada' => $this->tipojornada
        ]);

        $this->reset(['open_save', 'tipojornada']);
        $this->emitTo('horarios','render');
        $this->emit ('alert', 'La jornada se creo Exitosamente');
    }


    public function render()
    {
        $jornadas = Jornada::where('tipojornada', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->get();
        return view('livewire.horarios', compact('jornadas'));
    }

    public function order($sort)
    {

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

    public function edit(Jornada $jornada)
    {
        $this->jornada = $jornada;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();
        $this->jornada->save();
        $this->reset(['open_edit']);
        $this->emit('alert', 'la jornada se actialiso exitosamente');
    }


}
