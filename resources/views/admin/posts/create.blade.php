@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <form class="" action="{{route('admin.posts.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control mb-2" id="title" name="title"  placeholder="Enter title" value=" {{ old('title') }} ">
                        @error ('title')
                        <div class="text-warning">
                            <small> {{$message}}</small>
                        </div>
                        @enderror
                        <label for="text">Content</label>
                        <textarea name="content" rows="8" cols="80" value=" {{ old('content') }} "></textarea>

                        @error ('content')
                        <div class="text-warning">
                            <small> {{$message}}</small>
                        </div>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
