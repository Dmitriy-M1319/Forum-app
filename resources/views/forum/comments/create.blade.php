@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create comment') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comments.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nickname" class="col-md-4 col-form-label text-md-end">{{ __('Nickname') }}</label>

                            <div class="col-md-6">
                                <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ $comment->nickname }}" required autocomplete="nickname" autofocus>

                                @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="comm_text" class="col-md-4 col-form-label text-md-end">{{ __('Comment Text') }}</label>

                            <div class="col-md-6">
                                <input id="comm_text" type="text" class="form-control @error('comm_text') is-invalid @enderror" name="comm_text" >

                                @error('comm_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="carma" class="col-md-4 col-form-label text-md-end">{{ __('Carma') }}</label>

                            <div class="col-md-6">
                                <input id="carma" type="text" class="form-control @error('carma') is-invalid @enderror" name="carma" value="{{ $comment->carma }}" required autocomplete="carma">

                                @error('carma')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="post_id" class="col-md-4 col-form-label text-md-end">{{ __('Post №') }}</label>

                            <div class="col-md-6">
                                <input id="post_id" type="text" class="form-control @error('post_id') is-invalid @enderror" name="post_id" value="{{ $comment->post_id }}" required autocomplete="post_id">

                                @error('post_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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
