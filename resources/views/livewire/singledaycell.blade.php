<?php



use App\Models\Calendar;
use App\Models\Appointment;
use function Livewire\Volt\{state, mount, with};

state('day');
state('month');
state('selected', false);
state('calendar');

//
$activated = function(){
    if(!$this->selected){
        $this->dispatch('activated',['day'=>$this->day]);
    }else{
        $this->dispatch('createappointment');
    }
};

mount(function(Calendar $calendar){
    $this->calendar = $calendar;
});

with(function(){
    $date = new DateTime();
    $date->setDate($date->format('Y'), $this->month, (int)$this->day);
    $appointments = Appointment::where('date',$date->format('Y-m-d'))->where('calendar_id',$this->calendar->id)->orderBy('time','ASC')->get();
    return [
        'appointments'=>$appointments,
    ];
})
?>

<div  wire:click="activated" class=" self-stretch grow">
    <div @if($selected)  class="text-white bg-green-600 rounded-full w-5 h-5 text-center leading-none" @else class="text-white"  @endif>
        {{$day}}
    </div> 

    @foreach ($appointments as $a)
        <div style="background-color: {{$a->calendar->color}}" class="w-full text-sm rounded-md @if(!$a->calendar->color) bg-green-700 @endif font-bold py-1 px-2 shadow-sm shadow-green-900">
            <a href="/calendars/{{$calendar->id}}/appointments/{{$a->id}}" wire:navigate.hover>
                {{$a->time()}} - {{ $a->endtime()}} {{$a->title;}}
            </a>
        </div>
    @endforeach
    <button></button>
</div>
