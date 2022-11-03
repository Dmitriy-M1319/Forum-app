@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header"> Theme: {{ $post->thread()->first()->theme }}</div>
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
        @if ($comments->count() != 0)
            @foreach ($comments as $comment )
                <div class="container">
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
                    </div>
                <div>
            @endforeach
        @endif
    </div>
</div>
@endsection
