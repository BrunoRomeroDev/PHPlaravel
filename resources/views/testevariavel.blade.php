@extends('layouts.main')
@section('title','teste')
@section('content')
<h1>Algum titulo</h1>
       <img src="/img/banner.jpg" alt="Banner">
       @if(10 > 15)
                <h1>a condicao é true</h1>
        @else
                <h1>a condição é false </h1>
        @endif

        <p>{{$nome}}</p>

        @if($nome == "bruno")
                <h1>O nome é bruno</h1>
        @else

                <h1>O nome NAO é bruno</h1>
        @endif

        @for($i = 0 ;  $i < count($arr); $i++)
            <h1>{{ $arr[$i] }} -{{$i}}</h1>
        @endfor

        @php
                $name = "joao";
                echo $name;
        @endphp

        <!--- Comentario html-->
        {{--comentario do laravel--}}


        @foreach($names as $nome)
            <h1>{{$loop->index}}</h1>
            <h1>{{$nome}}</h1>

        @endforeach

@endsection
