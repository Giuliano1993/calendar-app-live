<?php

namespace App\Livewire;

use Livewire\Component;

class SingleDayCell extends Component
{


    public $day;
    public $selected = false;


    public function activated(){
        $this->dispatch('activated',['day'=>$this->day]);
    }


    public function render()
    {
        return view('livewire.single-day-cell');
    }
}
