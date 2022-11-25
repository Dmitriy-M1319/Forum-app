@extends('layouts.app')

@section('content')
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
                    <form method="POST" action="{{ route('click_carma_post', $post->post_id) }}">@method('PUT')
                        @csrf

                        <p>
                            <input type="radio" value="1" checked name="carma_value"/>Plus Carma
                        </p>
                        <p>
                            <input type="radio" value="-1" name="carma_value"/>Minus Carma
                        </p>
                        <button class="btn btn-secondary" type="submit">
                            {{ __('Send Carma') }}
                        </button>
                    </form>
                    <br>
                    <div class="btn btn-primary">
                        <a class="link-light" href="{{ route('posts.show', $post->post_id) }}">Comments</a>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::user()->role == 0)
                        <div class="btn btn-secondary">
                            <a class="link-light" href="{{ route('posts.edit', $post->post_id) }}">Edit Post</a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
@endsection
