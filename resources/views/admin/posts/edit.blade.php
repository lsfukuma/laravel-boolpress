@extends('layouts.app')
@section('title', 'Modify your post')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <form action="{{route('adminposts.update', $post['id'])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control mb-2" id="title" name="title"  placeholder="Enter title" value=" {{ old('title', $post->title)}} ">
                        @error ('title')
                        <div class="text-warning">
                            <small> {{$message}}</small>
                        </div>
                        @enderror
                        <textarea class="form-group" placeholder="Start write here your post"name="content" rows="10" cols="110"> {{ old('content', $post->content) }} </textarea>

                        @error ('content')
                        <div class="text-warning">
                            <small> {{$message}}</small>
                        </div>
                        @enderror
                        <button type="submit" class="btn btn-info d-inline-block">Modify</button>
                    </div>
                </form>
                <form class="d-inline-block" action="{{route('adminposts.destroy', $post['id'])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" name="button">Delete</button>
                </form>
            </div>
        </div>
    </div>

@endsection
