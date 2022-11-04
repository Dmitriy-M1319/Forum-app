@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit thread') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('threads.update', $thread->thread_id) }}">
                        @method('PUT')
                        @csrf

                        <div class="row mb-3">
                            <label for="theme" class="col-md-4 col-form-label text-md-end">{{ __('Theme') }}</label>

                            <div class="col-md-6">
                                <input id="theme" type="text" class="form-control @error('theme') is-invalid @enderror" name="theme" value="{{ $thread->theme }}">

                                @error('theme')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <form class="mt-2" action="{{ route('threads.destroy', $thread->thread_id) }}" method="POST">@csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-outline-danger">Remove Thread</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection:
