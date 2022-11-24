@extends('layouts.app')

@section('content')
    <div class="card">
    <div class="card-header">Found posts</div>
    @if ($posts->count() != 0)
        @foreach ($posts as $post)
            <div class="card">
                <div class="card-header"> Theme: {{ $post->thread()->first()->theme }},  Post #{{ $post->post_id }}</div>
                <div class="card-body">
                    <div class="place-items-start">
                        Author: {{ $post->nickname }}
                    </div>
                    <div class="place-items-center">
                        <div class="row mb-3">
                            Date: {{ $post->date_create}}
                        </div>
                        <div class="row mb-3">
                            Text: {{ $post->post_text}}
                        </div>
                        <div class="row mb-3">
                            Carma: {{ $post->carma}}
                        </div>
                    </div>
                    <div class="btn btn-primary">
                        <a class="link-light" href="{{ route('posts.show', $post->post_id) }}">Comments</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    </div>
@endsection
