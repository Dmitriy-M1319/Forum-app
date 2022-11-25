<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Forum\BaseController;
use App\Http\Requests\StoreForumPostRequest;
use App\Models\ForumPost;
use App\Models\ForumThread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller for forum posts
 */
class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forum.posts.index', ['posts' => ForumPost::OrderBy('post_id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $newPost = new ForumPost();
       $newPost->date_create = date('Y-m-d H:i:s');
       $newPost->nickname = Auth::user()->nickname;
       $newPost->carma = 0;
       $threads = ForumThread::all();
       return view('forum.posts.create', ['edit' => 0, 'post' => $newPost, 'threads' => $threads]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForumPostRequest $request)
    {
        $validation = $request->validated();
        $validation['date_create'] = date('Y-m-d H:i:s');
        $post = ForumPost::create($validation);
        //return redirect()->route('posts.show', $post->post_id);
        return redirect()->route('user_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = ForumPost::where('post_id', $id)->first();
        if(empty($post))
            abort(404);
        $comments = $post->comments()->orderBy('comm_id')->get();
        return view('forum.posts.show', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = ForumPost::where('post_id', $id)->first();
        if(empty($post))
            abort(404);

        if(($post->nickname != Auth::user()->nickname) && (Auth::user()->role > 0))
            abort(404);

        $threads = ForumThread::all();
        return view('forum.posts.edit', ['post'=> $post, 'threads' => $threads]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreForumPostRequest $request, $id)
    {
        $valid = $request->validated();
        $valid['date_create'] = date('Y-m-d H:i:s');
        $post = ForumPost::where('post_id', $id)->first();
        if(empty($post))
            abort(404);
        $post->fill($valid);
        $post->save();
        //return redirect()->route('posts.show', $post->post_id);
        return redirect()->route('user_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedPost = ForumPost::where('post_id', $id)->first();
        if(empty($deletedPost))
            abort(404);
        $deletedPost->delete();
        //return redirect()->route('posts.index');
        return redirect()->route('user_index');
    }

    public function clickCarma(Request $request, $id) {
        $value = $request['carma_value'];
        settype($value, "integer");
        $post = ForumPost::where('post_id', $id)->first();
        $post->carma = (int)($post->carma) + $value;
        $post->save();
        return redirect()->route('posts.index');
    }

}
