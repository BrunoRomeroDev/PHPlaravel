@extends('layouts.main')
@section('title','Empresa de eventos')
@section('content')


@foreach($events as $event)



<p>{{$event->title}} -- {{$event->description}}</p>

@endforeach


@endsection
