@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table">
                <a href="{{route('admin.posts.create')}}" class="btn btn-md btn-success align-right m-3">Write a new post</a>
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
                          <td>{{ $post->created_at}}</th>
                          <td>{{ $post->title}}</td>
                          <td>{{ $post->slug}}</td>
                          <td>
                              <a class="btn btn-sm btn-info" href="{{route('adminposts.show', $post['id'])}}">Details</a>
                              <a class="btn btn-sm btn-warning" href="#">Modify</a>
                              <a class="btn btn-sm btn-danger"href="#">Delete</a>
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
