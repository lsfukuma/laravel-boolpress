@extends('layouts.app')
@section('title' , 'Contact us!')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('contact.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter your name">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <textarea name="                       name" class="form-control"rows="8" cols="80" placeholder="Write your message here"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
