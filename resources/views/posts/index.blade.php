@extends('layouts.base')

@section('title', 'Posts')

@section('content')

    <div class="container mt-5">
        <div class="filter">
        @include('posts.components.filter',['params' => $params])
        </div>
    </div>
    <div class="list">
        @include('posts.components.list',['posts' => $posts])
    </div>

@endsection
@section('js')
    <script src="/js/filter.js"></script>
@endsection
