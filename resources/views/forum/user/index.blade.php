@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User: {{ $user->nickname}}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                {{ __('Мy Posts') }}
                            </div>
                            @foreach($userPosts as $post)
                                <div class="card">
                                    <div class="card-header"> Theme: {{ $post->thread()->first()->theme }}, Post
                                        #{{ $post->post_id }}</div>
                                    <div class="card-body">
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
                                            <div class="btn btn-primary">
                                                <a class="link-light" href="{{ route('posts.show', $post->post_id) }}">Comments</a>
                                            </div>
                                            <div class="btn btn-secondary">
                                                <a class="link-light" href="{{ route('posts.edit', $post->post_id) }}">Edit
                                                    Post</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                {{ __('Мy Comments') }}
                            </div>
                            @foreach($userComments as $comment)
                                <div class="card">
                                    <div class="card-header"> Comment #{{ $comment->comm_id }}, Post
                                        #{{ $comment->post_id }}</div>
                                    <div class="card-body">
                                        <div class="place-items-center">
                                            <div class="row mb-3">
                                                Text: {{ $comment->comm_text }}
                                            </div>
                                            <div class="row mb-3">
                                                Carma: {{ $comment->carma }}
                                            </div>
                                        </div>
                                        <div class="btn btn-primary">
                                            <a class="link-light" href="{{ route('posts.show', $comment->post_id) }}">Post</a>
                                        </div>
                                        <div class="btn btn-secondary">
                                            <a class="link-light"
                                               href="{{ route('comments.edit', $comment->comm_id) }}">Edit Comment</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">Actions</div>
                            <div class="card-body">
                                <div class="btn btn-primary">
                                    <a class="link-light" href="{{ route('posts.create') }}">Create Post</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="btn btn-primary">
                                    <a class="link-light" href="{{ route('posts.index') }}">Show Posts</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('find_posts')}}">@csrf
                                    <label for="word">{{ __('Find Posts By Word') }}</label>

                                    <div class="col-md-6">
                                        <input id="word" type="text"
                                               class="form-control @error('word') is-invalid @enderror" name="word">

                                        @error('word')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Find') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                        @if(Auth::user()->role == 0)
                            <div class="card">
                                <div class="card-header">Admin Actions</div>
                                <div class="card-body">
                                    <form method="GET" action="{{ route('threads.admin') }}">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="thread_id"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Edit Thread Theme') }}</label>

                                            <div class="col-md-6">
                                                <select id="thread_id" name="thread_id">
                                                    @foreach($threads as $thread)
                                                        <option
                                                            value="{{$thread->thread_id}}">{{ $thread->theme }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-secondary">
                                                    {{ __('Edit Thread') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('users.admin') }}">
                                        @method('DELETE')
                                        @csrf
                                        <div class="row mb-3">
                                            <label class="col-md-4 col-form-label text-md-end" for="nickname">{{ __('Block User By Nickname') }}</label>

                                            <div class="col-md-6">
                                                <input id="nickname" type="text" class="form-control @error('id') is-invalid @enderror" name="nickname">

                                                @error('nickname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-danger">
                                                    {{ __('Block User') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <form method="POST" action="{{ route('logout') }}">@csrf
                            <div class="align-content-center">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Logout') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
