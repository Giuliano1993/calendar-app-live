<?php

use App\Models\Calendar;
use function Livewire\Volt\{state, rules, mount};

state([
    'name',
    'description',
    'color',
    'successMessage',
    'calendar',
    'method'
]);

rules([
    'name'=>'required|min:6',
    'description'=>'required',
    'color'=>'nullable'
]);


$submit = function(){
    $calendar = new Calendar();
    $calendar->name = $this->name;
    $calendar->description = $this->description;
    $calendar->color = $this->color;

    $calendar->save();

    return $this->redirect("/calendars/{$calendar->id}",navigate:true);
};

$update = function(){
    $this->calendar->name = $this->name;
    $this->calendar->description = $this->description;
    $this->calendar->color = $this->color;
    $this->calendar->update([
        'name'=>$this->name,
        'description'=>$this->description,
        'color'=>$this->color
    ]);
    return $this->redirect("/calendars",navigate:true);
};

mount(function($calendarId = null, $method = 'submit'){
    if($calendarId){
        $calendar = Calendar::find($calendarId);
        $this->name = $calendar->name;
        $this->description = $calendar->description;
        $this->color = $calendar->color;
        $this->calendar = $calendar;
    }
    $this->method = $method;
})

?>

<div>
    <form wire:submit.prevent="{{$method}}">
        <div class="flex flex-col">
            <label>Name</label>
            <input type="text" wire:model="name" class="rounded-md bg-zinc-800 text-white p-2 caret-lime-500 focus:ring-lime-500 focus:outline-none focus:ring">
            @error('name')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label>Description</label>
            <textarea wire:model="description" class="rounded-sm bg-zinc-800 text-white p-2"></textarea>
            @error('description')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label>Color</label>
            <input type="color" wire:model="color">
        </div>
        <div wire:loading> 
            Saving appointment...
        </div>
        @if($successMessage)
            <div class="bg-lime-500 shadow shadow-lime-600 text-blue-950">{{ $successMessage }}</div>
        @endif
        <button class="button ml-auto inline-block" type="submit">
            Save
        </button>
    </form>
</div>
