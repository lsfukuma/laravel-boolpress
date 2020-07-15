@extends('layouts.app')
@section('title', 'Write a new post')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <form action="{{route('adminposts.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control mb-2" id="title" name="title"  placeholder="Enter title" value=" {{ old('title') }} ">
                        @error ('title')
                        <div class="text-warning">
                            <small> {{$message}}</small>
                        </div>
                        @enderror
                        <textarea class="form-control mb-2"
                            placeholder="Start to write your post"
                         name="content" rows="10" cols="110">{{ old('content') }}</textarea>

                        @error ('content')
                        <div class="text-warning">
                            <small> {{$message}}</small>
                        </div>
                        @enderror
                        <label for="category" class="mb-2">Category: </label>
                        <select class="form-control mb-2" name="category_id">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id}}">
                                    {{ $category->name}}
                                </option>
                            @endforeach
                        </select>
                        <label for="">Tags (you can choose more than one):  </label>
                        @foreach ($tags as $tag)
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{$tag->name}}
                        @endforeach

                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
