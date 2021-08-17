@extends('lists')

@section('conteudo')
    
    @foreach ($lists as $l)
        {{ $l->name }} <br>
    @endforeach

@endsection