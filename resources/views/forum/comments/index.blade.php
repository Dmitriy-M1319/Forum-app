@extends('layouts.app')

@section('content')

@foreach ($comments as $comment)
    <div class="card">
        <div class="card-header"> Comment #{{ $comment->comm_id }}, Post #{{ $comment->post_id }}</div>
        <div class="card-body">
            <div class="place-items-start">
                Author: {{ $comment->nickname }}
            </div>
            <div class="place-items-center">
                <div class="row mb-3">
                    Text: {{ $comment->comm_text }}
                </div>
                <div class="row mb-3">
                    Carma: {{ $comment->carma }}
                </div>
            </div>
        </div>
        <a href="{{ route('posts.show', $comment->post_id) }}">Post</a>
    </div>
@endforeach
@endsection
