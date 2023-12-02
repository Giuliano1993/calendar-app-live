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
    
    #[Validate('required|min:5')]
    public $title;
   
    #[Validate('nullable')]
    public $description;

    public ?Appointment $appointment;


    public function store(){
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
        $this->title = $appointment->title;
        $this->description = $appointment->description;
    }

    public function setDate($d){
        $this->date = $d;
    }

}
