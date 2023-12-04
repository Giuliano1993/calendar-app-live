
@extends('layout')
@section('content')
    <div class="w-3/4 m-auto">
        <livewire:fullcalendar calendarId="{{$calendar->id}}">
    </div>
@endsection
