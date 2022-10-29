@extends('layouts.app')

@section('content')

@foreach ($posts as $post)
    <div class="card">
        <div class="card-header">{{ $post->thread_id }}</div>
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
    </div>
@endforeach
@endsection
