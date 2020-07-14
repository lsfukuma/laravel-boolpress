@extends('layouts.app')
@section ('title', 'List of posts')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                  <thead>
                        <tr>
                              <th scope="col">Date</th>
                              <th scope="col">Title</th>
        
                        </tr>
                  </thead>
                  <tbody>
                        @forelse ($posts as $post)
                        <tr>
                              <td>{{ $post->created_at }}</th>
                              <td>
                                  <a href="{{route('posts.show', ['slug'=>$post->slug])}}"> {{ $post->title }} </a>
                              </td>

                        </tr>
                        @empty
                            <tr>
                                <td>No posts to show</td>
                            </tr>
                        @endforelse
                  </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
