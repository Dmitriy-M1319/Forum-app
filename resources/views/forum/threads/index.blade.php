@extends('layouts.app')

@section('content')

<div class="container">
    @foreach ($threads as $thread)
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
    @endforeach
</div>

<div class="container">
    {{ $threads->links() }}
</div>
@endsection
