<?php

namespace App\Livewire\Forms;

use App\Models\Appointment;
use DateTime;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AppointmentForm extends Form
{
    #[Validate('required')]
    public $date;

    #[Validate('required')]
    public $time;
    
    #[Validate('required')]
    public $endtime;
    
    #[Validate('required|min:5')]
    public $title;
   
    #[Validate('nullable')]
    public $description;

    #[Validate('required')]
    public $calendar_id;

    public ?Appointment $appointment;


    public function store(){
        //dd($this->all());
        $this->validate();
        
        Appointment::create($this->all());
    }

    public function update(){
        $this->validate();

        $this->appointment->update($this->all());


    }

    public function setAppointment(Appointment $appointment){
        $this->appointment = $appointment;

        $this->date = $appointment->date;
        $this->time = $appointment->time;
        $this->endtime = $appointment->endtime;
        $this->title = $appointment->title;
        $this->calendar_id = $appointment->calendar_id;
        $this->description = $appointment->description;
    }

    public function setDate($d){
        $this->date = $d;
    }

    public function setCalendarId($calendarId){
        $this->calendar_id = $calendarId;
    }

}
