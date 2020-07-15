@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table table-hover">
                <a href="{{route('adminposts.create')}}" class="btn btn-md btn-success align-right m-3">Write a new post</a>
              <thead>
                    <tr>
                          <th scope="col">Date</th>
                          <th scope="col">Title</th>
                          <th scope="col">Slug</th>
                          <th scope="col">Category</th>
                          <th scope="col">Tags</th>
                          <th scope="col-2">Options</th>
                    </tr>
              </thead>
              <tbody>
                    @forelse ($posts as $post)
                    <tr>
                          <td>{{ $post->created_at }}</th>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->slug }}</td>
                          <td>
                              @if ($post->category)
                                    {{ $post->category->name }}
                              @endif
                          </td>
                          @if ($post->tags)
                                <td>
                                   @foreach ($post->tags as $tag)
                                   {{ $tag->name}}
                                    @endforeach
                                </td>
                          @else
                                <td> no tags </td>
                          @endif
                          <td>
                              <a class="btn btn-sm btn-info" href="{{route('adminposts.show', $post['id'])}}">Details</a>
                              <a class="btn btn-sm btn-warning" href="{{route('adminposts.edit', $post['id'])}}">Edit</a>
                              <a class="btn btn-sm btn-danger"href="{{route('adminposts.edit', $post['id'])}}">Delete</a>
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
