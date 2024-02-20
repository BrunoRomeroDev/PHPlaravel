@extends('layouts.main')
@section('title','teste')
@section('content')

@if ($busca!= null)
    <h1>Exibindo produto id : {{$busca}}</h1>
@endif
@endsection
