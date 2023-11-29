<div wire:click="activated">
    <div @if($selected)  class="text-white bg-green-600 rounded-full w-5 h-5 text-center leading-none" @else class="text-white"  @endif>
        {{$day}}
    </div> 
    <button></button>
</div>
