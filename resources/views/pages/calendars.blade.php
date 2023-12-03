<?php
 
use App\Models\Calendar;
use Illuminate\View\View;
 
use function Laravel\Folio\render;
 
render(function (View $view, Calendar $post) {
    $calendars = Calendar::all();
 
    return $view->with('calendars', $calendars);
}); ?>



@extends('welcome')
@section('content')
    <div class="w-3/4 m-auto">
        <h1 class="text-2xl text-white font-extrabold py-5">Your Calendars</h1>
        @if (count($calendars->toArray()) > 0)
            <a class="ml-auto inline-block my-3 p-3 bg-lime-500 rounded-md text-blue-950 font-bold" href="/calendars/new">Create calendar</a>
        @endif
        @forelse ($calendars as $calendar)
            <div class=" bg-blue-300 text-blue-950 font-bold flex justify-between p-4 my-1 rounded-sm">
                <div>
                    <h2 class="text-lg">{{$calendar->name}}</h2>
                    <h3>{{$calendar->description}}</h3>
                </div>
                <div class="self-end ml-auto mr-2">
                    <a class="button " href="/calendars/{{$calendar->id}}">Open Calendar</a>    
                </div>
                <div class="self-end">
                    <a class="button" href="/calendars/{{$calendar->id}}/edit">Edit</a>    
                </div>
            </div>
        @empty
            <div class="bg-blue-300 text-blue-950 font-bold flex align-middle gap-3 p-3">
                
                <p class="self-center">No calendars Yet!</p>

                <a class="button" href="/calendars/new">Create your first calendar</a>
            </div>
            
        @endforelse
    </div>
@endsection