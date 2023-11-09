@extends('layouts.base')

@section('title', 'Login')

@section('content')
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-md-6">
            <div class="card rounded p-5" style="background-color: #f5f5f5;  min-height: 400px" >
                <div class="card-body">
            <a href="{{ route('welcome') }}" class="btn btn-secondary">Back</a>
            <h2 class="text-center">Login Form</h2>
            <form action="{{route('auth.authenticate')}}" method="post">
                @csrf
                @error('login_error')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter your email">
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
            </div>
        </div>
    </div>
@endsection
