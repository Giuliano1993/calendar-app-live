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
    'method',
    'calendar_id',
    'appointment'
]);

mount(function($day = null,$month=null,$year=null, $appointmentId=null){
    
    if(!is_null($appointmentId)){
        $appointment = Appointment::find($appointmentId);
        $this->appointment = $appointment;
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
    if($this->calendar_id)$this->form->setCalendarId($this->calendar_id);
    $this->form->$method(); 
    //$this->successMessage = 'Appointment saved';
    $this->dispatch('saved');

    if($method == 'update'){

        return $this->redirect("/calendars/{$this->appointment->calendar_id}/appointments/{$this->appointment->id}",navigate:true);
    }

}
?>

<div>
    <form wire:submit.prevent="submit">
        @if($successMessage)
            <div class="bg-green-700  text-white rounded-md px-2 py-3 my-3">{{ $successMessage }}</div>
        @endif
        <div class="flex flex-col">
            <label>Date</label>
            <input class="rounded-md bg-zinc-800 text-white p-2 caret-lime-500 focus:ring-lime-500 focus:outline-none focus:ring" type="date" wire:model="form.date">
            @error('form.date')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label>Time</label>
            <input class="rounded-md bg-zinc-800 text-white p-2 caret-lime-500 focus:ring-lime-500 focus:outline-none focus:ring" type="time" wire:model="form.time">
            @error('form.time')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label>End Time</label>
            <input class="rounded-md bg-zinc-800 text-white p-2 caret-lime-500 focus:ring-lime-500 focus:outline-none focus:ring" type="time" wire:model="form.endtime">
            @error('form.endtime')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label>Title</label>
            <input class="rounded-md bg-zinc-800 text-white p-2 caret-lime-500 focus:ring-lime-500 focus:outline-none focus:ring" type="text" wire:model="form.title">
            @error('form.title')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label>Description</label>
            <textarea class="rounded-md bg-zinc-800 text-white p-2 caret-lime-500 focus:ring-lime-500 focus:outline-none focus:ring" wire:model="form.description"></textarea>
            @error('form.description')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror
        </div>
        @error('form.calendar_id')
            <div class="text-red-700 ">{{ $message }}</div>
        @enderror
        <div wire:loading> 
            Saving appointment...
        </div>
        
        <button class=" bg-lime-500 shadow shadow-lime-600 text-blue-950 font-extrabold rounded-sm ml-auto mt-5 block px-3 py-2"  type="submit">
            Save
        </button>
        
    </form>
</div>
