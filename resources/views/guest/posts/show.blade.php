@extends('layouts.app')
@section('title', 'Entire post')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5 class=""> <strong>Title:</strong> {{ $post->title }} </h5>
                <h6> <strong>Created:</strong> {{ $post->created_at}} </h6>
                <h6> <strong>Last updated:</strong> {{ $post->updated_at}}</h6>
                <p> {{ $post->content }} </p>
                <p> <strong>Category:</strong> {{ $post->category->name}}</p>
                <small> <strong>Slug:</strong> {{$post->slug }} </small>
            </div>

        </div>
    </div>

@endsection
