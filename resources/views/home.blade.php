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
          <form action="{{ route('posts.create') }}" method="POST" enctype="multipart/form-data">
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
            <div class="mb-3">
              <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" placeholder="Story photo"></input>
              @error('photo')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
              <button type="submit" class="btn btn-primary">Publish</button>
          </form>
        </div>
      </div>
    </div>
    <div class="list-group-item">
      <h4> Post Feeds</h4>
      <div class="list-group">
        @forelse($posts as $post)
        <a href=" {{ route('posts.show', ['post'=>$post->id])}} " class="list-group-item list-group-item-action mt-5 bg-lihgt badge-pill badge-primary">
          <div class="d-flex justify-content-between">
            <h5 class="font-sans leading-normal block mb-6">{{ $post->title}}</h5>
            <small class="text-body-secondary">{{ $post->created_at->diffForHumans()}} </small>
          </div>
          <p class="leading-normal mb-6 font-serif leading-loose">{{ $post->body}}</p>
          <small class="text-bofy-secondary">By {{ $post->user->name  }} </small>
          <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-secondary"> {{ $post->comments_count}} Comments </span>
            <span class="badge rounded-pill bg-secondary"> Add Comment </span>
          </div>
        </a>
        @empty
        <div class="list-group-item">Refresh the feed later. No Posts Found!!</div>
        @endforelse
      </div>
    </div>
  </div>
</div>

@endsection