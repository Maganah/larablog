<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>My Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body background="grey">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">My Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('posts') }}">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('comments')}}">Comments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Log Out</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container my-4">
      <div class="row">
        <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">My Blog Post</h5>
              <p class="card-text">This is my first blog post
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="bg-light py-4">
      <div class="container">

    @section('content')
        <div class="row">
          <div class="col-md-4 mx-auto mt-3">
            <div class="list-group">
              <div class="list-group-item">
              <h1>Create a Post</h1>
                <form action="{{ route ('posts')}}" method="POST">
                  <label for="title">Title:</label><br>
                  <input type="text" id="title" name="title" placeholder="Type the post title" required><br><br>
                  <label for="body">Body:</label><br>
                  <textarea id="body" name="body" placeholder="Start typing here" required></textarea><br><br>
                    <input type="submit" value=" Publish">
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="list-group-item">
          <h3>Post Feed</h3>
        </div>
      @endsection
      <p class="text-center">&copy; 2023 My Blog</p>
     </div>
    </footer>
