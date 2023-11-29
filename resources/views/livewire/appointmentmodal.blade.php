<?php

use function Livewire\Volt\{state, mount};
use App\Models\Appointment;


state([
    'day',
    'month',
    'year',
    'date',
    'time',
    'title',
    'description',
    'message'
]); 

mount(function($day,$month,$year){
    /**
     * @var DateTime $d
     * */
    $d= (new DateTime());
    $d->setDate($year, $month, $day);
    $this->date = $d->format('Y-m-d');

});
$save = function(){
    $appointment = new Appointment();
    $appointment->title = $this->title;
    $appointment->description = $this->description;
    $appointment->date = $this->date;
    $appointment->time = $this->time;
    $appointment->save();

    $this->message = 'Appointment saved';

    
};

?>
<div class="absolute  w-screen h-screen top-0 left-0 bg-opacity-50 bg-black">

    <div class="rounded-md bg-slate-300 shadow-sm p-2 w-1/3 modal absolute top-52 left-1/3 ">
        <div class="flex flex-col">
            <label>Appointment Date</label>
            <input type="date" wire:model="date">
        </div>
        <div class="flex flex-col">
            <label>Appointment Time</label>
            <input type="time" wire:model="time">
        </div>
        <div class="flex flex-col">
            <label>Title</label>
            <input type="text" wire:model="title">
        </div>
        <div class="flex flex-col">
            <label>Description</label>
            <textarea wire:model="description"></textarea>
        </div>
        <div wire:loading> 
            Saving appointment...
        </div>
        @if($message)
            <div class="text-green-700 ">{{ $message }}</div>
        @endif
        <button class=" bg-green-800  text-cyan-50 rounded-sm ml-auto mt-5 block px-3 py-2" wire:click="save">
            Save
        </button>
    </div>
</div>
