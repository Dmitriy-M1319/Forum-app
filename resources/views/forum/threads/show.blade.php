@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
    <div class="card-header">{{ $thread->thread_id }}</div>
        <div class="card-body">
            <div class="place-items-center">
                <div class="row mb-3">
                    Thread: {{ $thread->theme }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
