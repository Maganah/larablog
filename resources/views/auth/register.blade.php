@extends('layouts.auth')
@section('page-title', 'Register Page')

@section('content')
    <div class="card">
        {{ $errors }}
        <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') ?? ''}}" id="name" name="name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
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
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? ''}}" id="phone" name="phone">
                    @error('phone')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password" name="password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password-confirmation" class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" id="password-confirmation" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
        <div class="card-footer">
            <p>
                Alredy Have an Account?!  <a href="{{ route('login')}}"> Login Here!!</a>
            </p>
        </div>
    </div>
@endsection