@extends('master')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Send (Bulk) SMS </h5>
        <hr>
        @if ($errors->all())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)

                <li>{{$error}}</li>
                    
                @endforeach
                
            </div>            
        @endif
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="my-input">Title</label>
                <input id="title" name="title" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="my-input">Content</label>
                <textarea id="content" class="form-control" name="content" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-primary float-right">Add Post</button>
        </form>
    </div>
</div>
@stop