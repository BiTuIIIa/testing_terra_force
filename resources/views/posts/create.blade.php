@extends('layouts.base')

@section('title', 'Create Post')

@section('content')
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-md-6">
            <div class="card rounded p-5" style="background-color: #f5f5f5;  min-height: 400px" >
                <div class="card-body">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
                    <h2 class="text-center">Create New Post</h2>
                    <form action="{{route('posts.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                            @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" placeholder="Content"></textarea>
                            @error('content')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="Author">
                            @error('author')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
