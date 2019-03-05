@extends('master')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title"> {{ $post->title }} </h5>
        <hr>
        
        <p class="card-text"><i>{{ str_limit($post->content, 150) }} </i><button class="btn btn-info" type="button">Read more...</button></p>
        <hr>
        <p class="card-text"> {{ $post->content }} </p>
    </div>
    @auth
    <div class="btn-group" role="group" aria-label="Button group">
        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info float-right">Edit</a>
        <form onsubmit="return confirm('Are you sure you want to delete the post: {{$post->title}}?')" action="{{route('posts.destroy',$post->id)}}" method="post" class="d-inline-block">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>  
    @endauth
</div>
@stop