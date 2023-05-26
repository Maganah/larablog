@extends('layouts.auth')
@section('page-title', 'Login Page')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4> Login Here</h4>
            
        </div>
        <div class="card-body">
         <form action="{{ route('login') }}" method="POST">
                @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') ?? ''}}" id="email" name="email">
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="remember" for="remember">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        </div>
        <div class="card-footer">
            <p>
                Have NO Account?!  <a href="{{ route('register')}}"> Create Account Here!!</a>
            </p>
        </div>
    </div>
@endsection
