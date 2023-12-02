
@extends('welcome')
@section('content')
    <div class="w-3/4 m-auto bg-blue-300 rounded-md p-7 mt-11">
        <livewire:appointmentform appointmentId="{{$appointment->id}}" method="update">
    </div>
@endsection
