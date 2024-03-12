@extends('layouts.main')
@section('title','teste')
@section('content')


   <div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu Evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label for="title">Evento:</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
    </div>
    <div class="form-group">
        <label for="title">Cidade:</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Nome do evento">
    </div>
    <div class="form-group">
        <label for="title">O evento é privado:</label>
        <select class="form-control" id="private" name="private" >
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Descrição:</label>
        <textarea name="description" id="description" name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="title">Adicione itens de infraestrutura:</label>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Cadeiras">Cadeiras
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Palco">Palco
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Cerveja grátis">Cerveja grátis
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Open Food">Open food
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Brindes">Brindes
        </div>
    </div>
    <div class="form-group">
        <label for="title">Imagem do evento:</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
   </div>

@endsection
