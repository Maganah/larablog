@extends('layouts.app')

@section('page-title', "What's New Here?!")

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-3">
      <div class="card">
        <div class="card-body">
          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <h5 class="card-title">Create a New Post</h5>
          <form action="{{ route('posts') }}" method="POST">
            @csrf
            <div class="mb-3">
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Type the title of your post" name="title" value="{{ old('title') ?? '' }}">
              @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="5" placeholder="Describe your post"></textarea>
              @error('body')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Publish</button>
          </form>
        </div>
      </div>
      <div>
        <h4> Post Feeds</h4>
        <div>
          @forelse($posts as $post)
          @endforelse
        </div>
      </div>

    </div>
  </div>
</div>

@endsection