@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    <a href="/posts/create" class="btn btn-default">Create Posts</a>

                    <h3>Your Bog Posts </h3>

                    @if(count($post)>0)
                    <table class="table table-striped">

                        <tr>

                            <td>Title</td>


                            <td>Body</td>

                            </tr>

                            @foreach($post as $posts)
                            <tr>
                                <td>{{$posts->title}}</td>


                                <td>{{$posts->body}}</td>

                            </tr>
                            @endforeach


                    </table>

                    @else

                    <p>No post found</p>

                    @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
