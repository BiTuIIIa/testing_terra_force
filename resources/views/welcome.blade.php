@extends('layouts.base')

@section('title', 'Welcome')

@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="bg-secondary text-white p-4 rounded border border-dark">
        <h1>Welcome to Our Website</h1>
        <div class="d-flex justify-content-center">
            <a href="{{ route('auth.login') }}" class="btn btn-primary mx-2">Login</a>
            <a href="{{ route('auth.index.registration') }}" class="btn btn-warning mx-2">Registration</a>
        </div>
        </div>
    </div>
@endsection
