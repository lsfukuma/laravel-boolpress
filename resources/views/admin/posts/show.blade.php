@extends('layouts.app')

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
                    <h3>Text: </h3>
                    <p>{{ $post->content }}</p>
                </div>

            </div>

        </div>
    </div>
@endsection
