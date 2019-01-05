@extends('layouts.app')

@section('content')

<h1>Posts</h1>

@if(count($post)>0)

@foreach($post as $posts)

<div class="well">

<h3><a href="/posts/{{$posts->id}}">{{$posts->title}}</a></h3>

<small>written on {{$posts->created_at}} and written by {{$posts->user->name}}</small>
</div>

@endforeach

{{$post->links()}}

@else
<p>No post found</p>

@endif


@endsection