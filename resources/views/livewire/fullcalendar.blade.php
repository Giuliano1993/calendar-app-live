<?php

use function Livewire\Volt\{state};
use function Livewire\Volt\{mount};
use function Livewire\Volt\{on};



state([
    'month'=>'',
    'selectedDay'=>'',
    'startDay'=>'',
    'showModal'=>false,
    'year'=>date("Y")
]);
mount(function($month = NULL){
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
        $d = getdate(mktime(null,null,null,$this->month,1,$this->year));
        $this->startDay=array_search($d['weekday'],$days);


 });

 on(['activated' => function ($e) {
    $this->selectedDay = $e['day'];
}]);
 
on(['createappointment' => function () {
    
    $this->showModal = true;
}]);


?>
<div class="flex flex-col w-100 h-[100vh]">
    
    <div class="flex flex-wrap">
        <div class="w-1/7">Monday</div>
        <div class="w-1/7">Tuesday</div>
        <div class="w-1/7">Wednesday</div>
        <div class="w-1/7">Thursday</div>
        <div class="w-1/7">Friday</div>
        <div class="w-1/7">Saturday</div>
        <div class="w-1/7">Sunday</div>
    </div>
    <div class="flex flex-wrap h-100 grow">
        @for ($w = 0; $w < 5; $w++)
            @for ($d = 1; $d <= 7; $d++)
                <div class="cell w-1/7">
                    @php
                        if($w ==0 && $d == $startDay + 1){
                            $day = 1;
                        }elseif( ($w > 0 || $d > $startDay) && $day < date('t')){
                            $day++;
                        }else{
                            $day = '';
                        }
                    @endphp
                    <livewire:singledaycellvolt key="{{uniqid()}}" day="{{$day}}" selected="{{$day == $selectedDay}}">
                </div>
            @endfor
        @endfor
    </div>
    @if($this->showModal)
        <livewire:appointmentmodal day="{{$selectedDay}}" month="{{$month}}" year="{{$year}}">
    @endif
</div>