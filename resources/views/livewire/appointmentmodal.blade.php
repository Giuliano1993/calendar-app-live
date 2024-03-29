<?php

use function Livewire\Volt\{state, mount};
use App\Models\Appointment;


state([
    'day',
    'month',
    'year',
    'calendarId'
]); 

$close = fn()=>$this->dispatch('closeModal');
?>
<div class="absolute  w-screen h-screen top-0 left-0 bg-opacity-50 bg-black">
    <div class="rounded-md bg-blue-300 shadow-sm text-blue-900 p-4 w-1/3 modal absolute top-52 left-1/3 ">
        <div class="flex justify-between">
            <h3 class=" text-xl font-extrabold">New Appointment</h3>
            <span class="font-extrabold cursor-pointer" wire:click="close">X</span>
        </div>

        <livewire:appointmentform day="{{$day}}" month="{{$month}}" year="{{$year}}" method="store" calendar_id="{{$calendarId}}">
    </div>
</div>
