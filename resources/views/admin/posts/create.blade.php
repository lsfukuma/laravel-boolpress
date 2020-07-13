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
                        <textarea
                            placeholder="Start to write your post"
                         name="content" rows="10" cols="110">{{ old('content') }}</textarea>

                        @error ('content')
                        <div class="text-warning">
                            <small> {{$message}}</small>
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
