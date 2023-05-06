<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <h4>Registration</h4>
            <hr>
                <form method="POST" action="/register">
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}
                        </div>
                    @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required value="{{old('name')}}" placeholder="Enter Full Name">
                    </div>
                    <span class="test-danger"> @error ('name') {{$message}} @enderror</span><hr>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-group" id="email" name="email" required value="{{old('email')}}" placeholder="Enter your email">
                    </div>
                    <span class="test-danger"> @error ('email') {{$message}} @enderror</span>
                    <hr>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" class="form-group" id="phone" name="phone" maxlength="14" required value="{{old('phone')}}" placeholder="Enter phone number"> 
                    </div>
                    <span class="test-danger"> @error ('phone') {{$message}} @enderror</span><hr>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-group" id="password" name="password" required placeholder="Enter Password">  
                    </div>
                    <span class="test-danger"> @error ('password') {{$message}} @enderror</span><hr>
                    <div class="form-group">
                        <label for="password">Confirm Password:</label>
                        <input type="password" class="form-group" id="password_confirmation" name="password_confirmation" required placeholder="Re-enter your password">   
                    </div>
                    <span class="test-danger"> @error ('password_confirmation') {{$message}} @enderror</span><hr>
                    <div class="form-group">
                        <label for="remember-me">Remember me:</label>
                        <input type="checkbox" class="form-group" id="remember-me" name="remember-me">
                    </div>
                    <span class="test-danger"> @error ('remember-me') {{$message}} @enderror</span><hr>
                    <div class="form-group">
                        <input type="submit" value="Create Account">
                    </div>
                    <br>
                    <a href="{{ route('login') }}"> Already Registered? Log in Here!!!!!</a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>