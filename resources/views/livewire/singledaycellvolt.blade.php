<?php



use function Livewire\Volt\{state, mount, with};
use App\Models\Appointment;

state('day');
state('month');
state('selected', false);
//state('appointments');

//
$activated = function(){
    if(!$this->selected){
        $this->dispatch('activated',['day'=>$this->day]);
    }else{
        $this->dispatch('createappointment');
    }
};

mount(function(){
    
});

with(function(){
    $date = new DateTime();
    $date->setDate($date->format('Y'), $this->month, (int)$this->day);
    $appointments = Appointment::where('date',$date->format('Y-m-d'))->get();
    return [
        'appointments'=>$appointments,
        ''
    ];
})
?>

<div  wire:click="activated">
    <div @if($selected)  class="text-white bg-green-600 rounded-full w-5 h-5 text-center leading-none" @else class="text-white"  @endif>
        {{$day}}
    </div> 

    @foreach ($appointments as $a)
        <div class="w-full rounded-md bg-green-700 font-bold py-1 px-2 shadow-sm shadow-green-900">
            <a href="/appointments/{{$a->id}}">{{$a->title;}}</a>
        </div>
    @endforeach
    <button></button>
</div>
