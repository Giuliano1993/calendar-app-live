
@extends('welcome')
@section('content')
    <div class="w-3/4 m-auto bg-blue-300 rounded-md p-7 mt-11">
        <div class="font-bold  text-xl">
            Date: {{ \DateTime::createFromFormat('Y-m-d',$appointment->date)->format('d/m/Y') }}
        </div>
        <div class="font-bold">
            At {{ $appointment->time}}
        </div>
        <div class="font-bold  text-lg">
            {{ $appointment->title}}
        </div>
        <div>
            {{$appointment->descrizione}}
        </div>
        <div class="flex content-end justify-end gap-3">
            <a href="/appointments/{{$appointment->id}}/edit" class=" text-white rounded-md bg-green-800 px-5 py-3 inline-block">Edit</a>
            <a href="/calendar" class=" text-white rounded-md bg-green-800 px-5 py-3 inline-block">Back to Calendar</a>
        </div>
    </div>
@endsection
