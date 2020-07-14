@extends('layouts.app')
@section('title', 'Entire post')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5 class=""> Title: {{ $post->title }} </h5>
                <h6>Created: {{ $post->created_at}} </h6>
                <h6>Last updated: {{ $post->updated_at}}</h6>
                <p> {{ $post->content }} </p>
                <small>Slug: {{$post->slug }} </small>
            </div>

        </div>
    </div>

@endsection
