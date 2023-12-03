<?php

use function Livewire\Volt\{state, mount};
use App\Models\Appointment;


state([
    'day',
    'month',
    'year',
    'calendarId'
]); 


?>
<div class="absolute  w-screen h-screen top-0 left-0 bg-opacity-50 bg-black">
    <div class="rounded-md bg-slate-300 shadow-sm p-2 w-1/3 modal absolute top-52 left-1/3 ">
        <livewire:appointmentform day="{{$day}}" month="{{$month}}" year="{{$year}}" method="store" calendar_id="{{$calendarId}}">
    </div>
</div>
