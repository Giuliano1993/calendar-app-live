<?php

use function Livewire\Volt\{state};
use function Livewire\Volt\{mount};
use function Livewire\Volt\{on};



state([
    'month'=>'',
    'selectedDay'=>'',
    'startDay'=>'',
    'lastDayNumber'=>'',
    'showModal'=>false,
    'year'=>date("Y"),
    'calendarId'=>null
]);

mount(function($calendarId,$month = NULL){
     $days = [
         "Monday",
         "Tuesday",
         "Wednesday",
         "Thursday",
         "Friday",
         "Saturday",
         "Sunday"
     ];
     $this->calendarId = $calendarId;
     $this->month = $month ?? (new \DateTime())->format('m');                
     $this->selectedDay = date('d');

        $year = date("Y");
        $d = getdate(mktime(null,null,null,$this->month,1,$this->year));
        $this->startDay=array_search($d['weekday'],$days);
        $date = DateTime::createFromFormat('Y-m-d',"{$year}-{$this->month}-1");
        $this->lastDayNumber = $date->format('t');
        
    
 });

 on(['activated' => function ($e) {
    $this->selectedDay = $e['day'];
}]);
 
on(['createappointment' => function () {
    
    $this->showModal = true;
}]);


on(['saved' => function () {
    $this->showModal = false;
}]);

on(['closeModal'=> function(){
    $this->showModal = false;
}]);

$nextMonth = function(){
    $days = [
         "Monday",
         "Tuesday",
         "Wednesday",
         "Thursday",
         "Friday",
         "Saturday",
         "Sunday"
     ];
    $this->month++;
    $year = date("Y");
    $d = getdate(mktime(null,null,null,$this->month,1,$this->year));
    $this->startDay=array_search($d['weekday'],$days);
    $date = DateTime::createFromFormat('Y-m-d',"{$year}-{$this->month}-1");
        $this->lastDayNumber = $date->format('t');
};
$prevMonth = function(){
    $days = [
         "Monday",
         "Tuesday",
         "Wednesday",
         "Thursday",
         "Friday",
         "Saturday",
         "Sunday"
     ];
    $this->month--;
    $year = date("Y");
    $d = getdate(mktime(null,null,null,$this->month,1,$this->year));
    $this->startDay=array_search($d['weekday'],$days);
    $date = DateTime::createFromFormat('Y-m-d',"{$year}-{$this->month}-1");
        $this->lastDayNumber = $date->format('t');
    
};
?>
<div class="flex flex-col w-100 h-[calc(100vh-100px)] my-3 ">
    <div class="flex my-5 align-middle">
        <div wire:click="prevMonth" class="text-cyan-100  text-center text-2xl font-bold p-2 cursor-pointer">
            <
        </div>
        <h1 class="text-cyan-100  text-center text-2xl font-bold border p-2 grow">
            {{ \DateTime::createFromFormat('m',$this->month)->format('F')}}
        </h1>
        <div  wire:click="nextMonth" class="text-cyan-100  text-center text-2xl font-bold p-2 cursor-pointer">
            >
        </div>
    </div>
    <div class="flex flex-wrap">
        <div class="w-1/7 text-blue-900 font-semibold text-center bg-blue-300 py-4">Monday</div>
        <div class="w-1/7 text-blue-900 font-semibold text-center bg-blue-300 py-4">Tuesday</div>
        <div class="w-1/7 text-blue-900 font-semibold text-center bg-blue-300 py-4">Wednesday</div>
        <div class="w-1/7 text-blue-900 font-semibold text-center bg-blue-300 py-4">Thursday</div>
        <div class="w-1/7 text-blue-900 font-semibold text-center bg-blue-300 py-4">Friday</div>
        <div class="w-1/7 text-blue-900 font-semibold text-center bg-blue-300 py-4">Saturday</div>
        <div class="w-1/7 text-blue-900 font-semibold text-center bg-blue-300 py-4">Sunday</div>
    </div>
    <div class="flex flex-wrap h-100 grow">
        @for ($w = 0; $w < 5; $w++)
            @for ($d = 1; $d <= 7; $d++)
                <div class="cell w-1/7 border flex">
                    @php
                        if($w ==0 && $d == $startDay + 1){
                            $day = 1;
                        }elseif($w ==0 && $d <= $startDay){
                            $day = '';
                        }elseif( ($w > 0 || $d > $startDay)){
                            $day++;
                        }
                    @endphp
                    @if($day >= 1 && $day <= $this->lastDayNumber)
                        <livewire:singledaycell key="{{uniqid()}}" day="{{$day}}" month="{{$month}}" selected="{{$day == $selectedDay}}" calendar="{{$calendarId}}">
                    @endif
                </div>
            @endfor
        @endfor
    </div>
    @if($this->showModal)
        <livewire:appointmentmodal day="{{$selectedDay}}" month="{{$month}}" year="{{$year}}" calendarId="{{$calendarId}}">
    @endif
</div>