@extends('layouts.app')

@section('content')

<a href="/posts" class="btn btn-info">Go back</a>

<h1>{{$post->title}}</h1>

<div>

	<h3>{!! $post->body !!}</h3>

</div>

<p>created on {{$post->created_at}} and created by {{$post->user->name}}</p>

<hr><hr>

<!-- only the registerd user will see the button -->
@if(!Auth::guest())

<!-- only the posts owner can see the edit and delete button -->

@if(Auth::user()->id ==$post->user_id)


<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>



{!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}

{{Form::hidden('_method', 'DELETE')}}

{{Form::submit('Delete', ['class'=>'btn btn-danger'])}}

{!!Form::close()!!}

@endif

@endif

@endsection