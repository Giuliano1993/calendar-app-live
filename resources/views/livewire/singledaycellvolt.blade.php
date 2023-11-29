<?php

use function Livewire\Volt\{state};
state('day');
state('selected', false);

//
$activated = function(){
    //$this->dispatch('activated',['day'=>$this->day]);
    if(!$this->selected){
        $this->dispatch('activated',['day'=>$this->day]);
    }else{
        $this->dispatch('createappointment');
    }
}
?>

<div  wire:click="activated">
    <div @if($selected)  class="text-white bg-green-600 rounded-full w-5 h-5 text-center leading-none" @else class="text-white"  @endif>
        {{$day}}
    </div> 
    <button></button>
</div>
