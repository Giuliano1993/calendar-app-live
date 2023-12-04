
@extends('layout')
@section('content')
    <div class="w-3/4 m-auto bg-blue-300 rounded-md p-7 mt-11">
        <div class="font-bold  text-xl">
            Date: {{$appointment->date()}}
        </div>
        <div class="font-bold">
            From {{ $appointment->time()}}
        </div>
        <div class="font-bold">
            to {{ $appointment->endtime()}}
        </div>
        <div class="font-bold  text-lg">
            {{ $appointment->title}}
        </div>
        <div>
            {{$appointment->description}}
        </div>
        <div class="flex content-end justify-end gap-3">
            <a href="/calendars/{{$appointment->calendar_id}}/appointments/{{$appointment->id}}/edit" class="button" wire:navigate>Edit</a>
            <a href="/calendars/{{$appointment->calendar_id}}" class="button" wire:navigate>Back to Calendar</a>
        </div>
    </div>
@endsection
