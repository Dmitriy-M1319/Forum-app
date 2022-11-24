@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header"> Theme: {{ $post->thread()->first()->theme }}, Post #{{ $post->post_id}}</div>
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
        </div>
        <br>
        @if ($comments->count() != 0)
            @foreach ($comments as $comment )
                <div class="card">
                    <div class="card-header"> Comment #{{ $comment->comm_id }}</div>
                    <div class="card-body">
                        <div class="place-items-start">
                            Author: {{ $comment->nickname }}
                        </div>
                        <div class="place-items-center">
                            <div class="row mb-3">
                                Comment text: {{ $comment->comm_text}}
                            </div>
                            <div class="row mb-3">
                                Carma: {{ $comment->carma}}
                            </div>
                        </div>
                        <form method="POST" action="{{ route('click_carma_comment', $comment->comm_id) }}">@method('PUT')
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
                    </div>
                <div>
            @endforeach
        @endif
                    <div class="card-footer">
                        <div class="btn btn-primary">
                            <a class="link-light" href="{{ route('comments.create', $post->post_id) }}">Write Comment</a>
                        </div>
                    </div>
    </div>
</div>
@endsection
