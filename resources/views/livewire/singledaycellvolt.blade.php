<?php



use function Livewire\Volt\{state, mount, with};
use App\Models\Appointment;

state('day');
state('month');
state('selected', false);
state('calendarId');

//
$activated = function(){
    if(!$this->selected){
        $this->dispatch('activated',['day'=>$this->day]);
    }else{
        $this->dispatch('createappointment');
    }
};


with(function(){
    $date = new DateTime();
    $date->setDate($date->format('Y'), $this->month, (int)$this->day);
    $appointments = Appointment::where('date',$date->format('Y-m-d'))->where('calendar_id',$this->calendarId)->orderBy('time','ASC')->get();
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
        <div style="background-color: {{$a->calendar->color}}" class="w-full rounded-md @if(!$a->calendar->color) bg-green-700 @endif font-bold py-1 px-2 shadow-sm shadow-green-900">
            <a href="/calendars/{{$calendarId}}/appointments/{{$a->id}}">
                {{$a->time()}} - {{ $a->endtime()}} {{$a->title;}}</a>
        </div>
    @endforeach
    <button></button>
</div>
