<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Forum\BaseController;
use App\Http\Requests\StoreForumPostRequest;
use App\Models\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

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
        $posts = ForumPost::all()->first();
        return view('forum.posts.index', ['posts' => ForumPost::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $newPost = new ForumPost();
       $newPost->date_create = Date::now();
       return view('forum.posts.create', ['edit' => 0, 'post' => $newPost]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForumPostRequest $request)
    {
        $validation = $request->validate();
        $post = ForumPost::create($validation);
        return redirect()->route('posts.show', $post->post_id);
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
        $comments = $post->comments()->get();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
