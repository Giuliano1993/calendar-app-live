<?php

use App\Models\Appointment;
use App\Livewire\Forms\AppointmentForm;
use function Livewire\Volt\{state, rules, mount, form};

form(AppointmentForm::class);

state([
    'day',
    'month',
    'year',
    'successMessage',
    'method'
]);

mount(function($day = null,$month=null,$year=null, $appointmentId=null){
    
    if(!is_null($appointmentId)){
        $appointment = Appointment::find($appointmentId);
        $this->form->setAppointment($appointment);
    }else{
        /**
         * @var DateTime $d
         * */
        $d= (new DateTime());
        $d->setDate($year, $month, $day);
        $date = $d->format('Y-m-d');
        $this->form->setDate($date);
    }

});

$submit = function(){
    $method = $this->method;
    $this->form->$method(); 
    $this->message = 'Appointment saved';
    $this->dispatch('saved');
}
?>

<div>
    <form wire:submit.prevent="submit">
        <div class="flex flex-col">
            <label>Appointment Date</label>
            <input type="date" wire:model="form.date">
            @error('form.date')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label>Appointment Time</label>
            <input type="time" wire:model="form.time">
            @error('form.time')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label>Title</label>
            <input type="text" wire:model="form.title">
            @error('form.title')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label>Description</label>
            <textarea wire:model="form.description"></textarea>
            @error('form.description')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror
        </div>
        <div wire:loading> 
            Saving appointment...
        </div>
        @if($successMessage)
            <div class="text-green-700 ">{{ $successMessage }}</div>
        @endif
        <button class=" bg-green-800  text-cyan-50 rounded-sm ml-auto mt-5 block px-3 py-2" type="submit">
            Save
        </button>
    </form>
</div>
