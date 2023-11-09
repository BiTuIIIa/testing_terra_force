@extends('layouts.base')

@section('title', 'Posts')


@section('content')

    <div class="container p-4 mt-5 mb-5">
        <a href="javascript:history.go(-1)" class="btn btn-secondary  btn-sm">Back</a>
    </div>
    <div class="container text-center border p-4 mt-5 mb-5">
        <h1 class="post-title display-4">{{$post->title}}</h1>
        <p class="lead">{{$post->content}}</p>
        <p class="font-italic">Author: {{$post->author}}</p>
    </div>
@endsection
