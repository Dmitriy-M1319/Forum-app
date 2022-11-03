@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit post') }}</div>

                <div class="card-body">
                    <form method="POST" action="@if($edit == 1){{ route('posts.update', $client) }}@else{{ route('posts.store') }}@endif">
                        @csrf

                        <div class="row mb-3">
                            <label for="post.nickname" class="col-md-4 col-form-label text-md-end">{{ __('Nickname') }}</label>

                            <div class="col-md-6">
                                <input id="post.nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="post.nickname" value="{{ $post->nickname }}" required autocomplete="post.nickname" autofocus>

                                @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="post_text" class="col-md-4 col-form-label text-md-end">{{ __('Post Text') }}</label>

                            <div class="col-md-6">
                                <input id="post_text" type="text" class="form-control @error('post_text') is-invalid @enderror" name="post.post_text" value="{{ $post->post_text }}" required autocomplete="post.post_text">

                                @error('post_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="carma" class="col-md-4 col-form-label text-md-end">{{ __('Carma') }}</label>

                            <div class="col-md-6">
                                <input id="carma" type="text" class="form-control @error('carma') is-invalid @enderror" name="post.carma" value="{{ $post->carma }}" required autocomplete="carma">

                                @error('carma')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="thread_id" class="col-md-4 col-form-label text-md-end">{{ __('Thread Id') }}</label>

                            <div class="col-md-6">
                                <input id="thread_id" type="text" class="form-control @error('thread_id') is-invalid @enderror" name="post.thread_id" value="{{ $post->thread_id }}" required autocomplete="thread_id">
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection:
