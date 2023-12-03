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
            <input type="text" wire:model="name" class="rounded-md bg-zinc-800 text-white p-2 caret-lime-500 focus:ring-lime-500 focus:outline-none focus:ring-2">
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
            <div class="bg-lime-500  text-blue-950">{{ $successMessage }}</div>
        @endif
        <button class=" bg-lime-500  text-blue-950 font-extrabold rounded-sm ml-auto mt-5 block px-3 py-2" type="submit">
            Save
        </button>
    </form>
</div>
