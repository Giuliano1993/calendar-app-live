<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
class CalendarComponent extends Component
{

    public $month;
    public $selectedDay;
    public $startDay;

    public $showModal  = false;

    public function mount($month = NULL){

        $days = [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
            "Sunday"
        ];
        $this->month = $month ?? (new \DateTime())->format('m');                
        $this->selectedDay = date('d');

        $year = date("Y");
        $d = getdate(mktime(0,null,null,$this->month,1,$year));
        $this->startDay=array_search($d['weekday'],$days);
    }

    #[On("activated")]
    public function changeActiveDay($d)
    {
        $this->selectedDay = $d['day'];
    }

    #[On("createappointment")]
    public function createAppointment(){
        dd($this);
        $this->showModal = true;
    }

    public function render()
    {

        return view('livewire.calendar-component');
    }
}
