<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\ForumComment;
use App\Models\ForumPost;
use App\Models\ForumThread;
use App\Models\ForumUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userPosts = $user->posts()->get();
        $userComments = $user->comments()->get();
        $threads = ForumThread::orderBy('thread_id')->get();
        return view('forum.user.index', ['user' => $user, 'userPosts' => $userPosts, 'userComments' => $userComments, 'threads' => $threads]);
    }

    public function findPosts(Request $request)
    {
        $word = $request['word'];
        $posts = ForumPost::where('post_text', 'LIKE', '%' . $word . '%')->get();
        return view('forum.user.find', ['word' => $word, 'posts' => $posts]);
    }

}
