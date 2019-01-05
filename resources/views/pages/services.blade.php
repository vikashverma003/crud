@extends('layouts.app')

@section('content')


        <h1>This is our Services page</h1>
        <p>And welcome to laravel from scratch </p>

        <h2>{{$services}}</h2>

        @if(count($title)>0)

        <ul class="list-group">
        @foreach($title as $titles)

        <li class="list-group-item">{{$titles}}</li>

        @endforeach

        </ul>

        @endif
@endsection