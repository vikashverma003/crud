@extends('layouts.app')

@section('content')

<h1>Edit Posts</h1>


{!! Form::open(['action'=>['PostsController@update', $post->id], 'method'=>'Post']) !!}

<div class="form-group">

{{Form::label('title', 'Title')}}

{{Form::text('title', $post->title, ['class'=>'form-control', 'placeholder'=>'title'])}}



</div>
    
<div class="form-group">

{{Form::label('body', 'Body')}}

{{Form::textarea('body', $post->body, ['id'=>'article-ckeditor', 'class'=>'form-control', 'placeholder'=>'body area'])}}



</div>

{{Form::hidden('_method', 'PUT')}}
    

{{Form::submit('submit', ['class'=>'btn btn-primary'])}}




{!! Form::close() !!}




@endsection