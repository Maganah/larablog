@extends('layouts.app')

@section('page-title', "What's New Here?!")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="list-group">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="list-group-item">
                <h4> {{ $post->title }}</h4>
            </div>
            <div class="list-group-item">
                <p class="leading-normal mb-6 font-serif leading-loose">{{ $post->body }}</p>
            </div>
            <div class="list-group-item">
                <form action="{{ route('comments.store', ['post'=>$post->id]) }}" method="POST">
                    @csrf
                    <div class="d-flex justify-content-between">
                        <div>
                            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="500" placeholder="Describe your post"></textarea>
                            @error('body')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Comment</button>
                    </div>

                </form>
                <div class="list-group">
                    @forelse($post->comments as $comment)
                    <div class="list-group-item">
                        <p class="leading-normal mb-6 font-serif leading-loose">{{ $comment->body}}</p>
                        <small class="text-bofy-secondary">By {{ $comment->user->name}} </small>
                    </div>
                    @empty
                    <div class="list-group-item list-group-item warning">Refresh the feed later. No Comments Found!!</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@endsection