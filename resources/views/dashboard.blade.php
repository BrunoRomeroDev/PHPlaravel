@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="col-md-10 off-set-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>

<div class="col-md-10 offsest-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
    
    <tbody>
        @foreach ($events as $event)
            <tr>
                <td scope="row">{{$loop->index +1}}</td>
                <td><a href="/event/{{$event->id}}">{{$event->title}}</a></td>
                <td>{{count($event->users)}}</td>
                <td><a href="event/edit/{{$event->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                    <form action="/events/{{$event->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline">Deletar</ion-icon></button>
                    </form>
            </tr>
        @endforeach
    </tbody>
</table>
    @else
    <p>Você ainda não tem eventos, <a href="/event/create">criar eventos</a></p>
    @endif
</div>
<div class="col-md-10 off-set-md-1 dashboard-title-container">
    <h1>Eventos que Participo</h1>
</div>
<div class="col-md-10 off-set-md-1 dashboard-title-container">
@if(count((array) $eventsasparticipant) > 0)
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Participantes</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>

<tbody>
    @foreach ($eventsasparticipant as $event)
        <tr>
            <td scope="row">{{$loop->index +1}}</td>
            <td><a href="/event/{{$event->id}}">{{$event->title}}</a></td>
            <td>{{count($event->users)}}</td>
            <td> 
                <form action="/event/leave/{{$event->id}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger delete-btn">
                    <ion-icon name="trash-outlline"></ion-icon>Sair do evento
                </button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
</table>  
@else
   <p>Você ainda não esta participando de nenhum evento. <a href="/">veja todos os eventos.</a></p> 
@endif   
</div>


@endsection