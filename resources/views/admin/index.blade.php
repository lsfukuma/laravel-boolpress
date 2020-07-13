@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table">
              <thead>
                    <tr>
                          <th scope="col">Date</th>
                          <th scope="col">Title</th>
                          <th scope="col">Slug</th>
                          <th scope="col">Options</th>
                    </tr>
              </thead>
              <tbody>
                    @forelse ($posts as $post)
                    <tr>
                          <th>{{ $post->created_at}}</th>
                          <td>{{ $post->title}}</td>
                          <td>{{ $post->content}}</td>
                          <td>{{ $post->slug}}</td>
                    </tr>
                    @empty
                        <div class="">
                            <p>No posts to show</p>
                        </div>
                    @endforelse
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
