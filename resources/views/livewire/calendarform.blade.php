<?php

use App\Models\Calendar;
use function Livewire\Volt\{state, rules};

state([
    'name',
    'description',
    'color',
    'successMessage'
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
}

?>

<div>
    <form wire:submit.prevent="submit">
        <div class="flex flex-col">
            <label>Name</label>
            <input type="text" wire:model="name">
            @error('name')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label>Description</label>
            <textarea wire:model="description"></textarea>
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
            <div class="text-green-700 ">{{ $successMessage }}</div>
        @endif
        <button class=" bg-green-800  text-cyan-50 rounded-sm ml-auto mt-5 block px-3 py-2" type="submit">
            Save
        </button>
    </form>
</div>
