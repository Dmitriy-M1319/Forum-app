<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Forum\BaseController;
use App\Http\Requests\StoreForumPostRequest;
use App\Models\ForumPost;

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
       $newPost->date_create = date('Y-m-d H:i:s');
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
        $validation = $request->validated();
        $validation['date_create'] = date('Y-m-d H:i:s');
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
        if(empty($post))
            abort(404);
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
        $post = ForumPost::where('post_id', $id)->first();
        if(empty($post))
            abort(404);
        return view('forum.posts.edit', ['post'=> $post]);
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
        return redirect()->route('posts.show', $post->post_id);
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
        return redirect()->route('posts.index');
    }
}
