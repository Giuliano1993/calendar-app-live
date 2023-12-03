
@extends('welcome')
@section('content')
    <div class="w-3/4 m-auto bg-blue-300 rounded-md p-7 mt-11">
        <h3 class=" text-xl font-extrabold">Update Appointment</h3>
        <livewire:appointmentform appointmentId="{{$appointment->id}}" method="update">
    </div>
@endsection
