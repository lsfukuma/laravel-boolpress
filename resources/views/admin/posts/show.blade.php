@extends('layouts.app')
@section('title' ,'Post in details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="">
                    <h1>Post's details</h1>
                    <h3>Date of creation: </h3>
                    <p>{{ $post->created_at }}</p>
                    <h3>Last updated at: </h3>
                    <p>{{ $post->updated_at }}</p>
                    <h3>Title: </h3>
                    <p>{{ $post->title }}</p>
                    <h3>Image: </h3>
                    @if ($post->img_link) 
                        <img src="{{ asset('storage/' . $post->img_link)}}" alt=" {{$post->title}}">
                    @else
                        <p>No image available</p>

                    @endif
                    <h3>Text: </h3>
                    <p>{{ $post->content }}</p>
                    <h4>Categories: </h4>
                    <p>
                        @foreach ($post->tags as $tag)
                            {{ $tag->name }}{{ $loop->last ? '' : ','}}
                        @endforeach
                    </p>


                </div>

            </div>

        </div>
    </div>
@endsection
