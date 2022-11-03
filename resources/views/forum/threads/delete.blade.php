@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
    <div class="card-header">{{ $deleted_thread_id }}</div>
        <div class="card-body">
            <div class="place-items-center">
                <div class="row mb-3">
                    This thread was removed successful.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
