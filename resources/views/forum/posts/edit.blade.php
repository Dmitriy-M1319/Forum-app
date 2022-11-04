@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update',$post->post_id) }}">
                        @method('PUT')
                        @csrf

                        <div class="row mb-3">
                            <label for="nickname" class="col-md-4 col-form-label text-md-end">{{ __('Nickname') }}</label>

                            <div class="col-md-6">
                                <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ $post->nickname }}" required autocomplete="nickname" autofocus>

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
                                <input id="post_text" type="text" class="form-control @error('post_text') is-invalid @enderror" name="post_text" value="{{ $post->post_text }}" required autocomplete="post_text">

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
                                <input id="carma" type="text" class="form-control @error('carma') is-invalid @enderror" name="carma" value="{{ $post->carma }}" required autocomplete="carma">

                                @error('carma')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="thread_id" class="col-md-4 col-form-label text-md-end">{{ __('Theme') }}</label>

                            <div class="col-md-6">
                                <input id="thread_id" type="text" class="form-control @error('thread_id') is-invalid @enderror" name="thread_id" value="{{ $post->thread_id }}" required autocomplete="thread_id">
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
                    <form class="mt-2" action="{{ route('posts.destroy', $post->post_id) }}" method="POST">@csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-outline-danger">Remove Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection:
