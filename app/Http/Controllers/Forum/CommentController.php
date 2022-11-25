<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\ForumComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('forum.comments.index', ['comments' => ForumComment::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       $newComment = new ForumComment();
       $newComment->nickname = Auth::user()->nickname;
       $newComment->carma = 0;
       $newComment->post_id = $id;
       return view('forum.comments.create', ['edit' => 0, 'comment' => $newComment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nickname' => 'required|max:30',
            'comm_text' => 'required',
            'post_id' => 'required|integer',
            'carma' => 'required|integer',
        ]);
        settype($validated['post_id'], "integer");
        $comment = ForumComment::create($validated);
        return redirect()->route('posts.show', $validated['post_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = ForumComment::where('comm_id', $id)->first();
        if(empty($comment))
            abort(404);

        if(($comment->nickname != Auth::user()->nickname) && (Auth::user()->role > 0))
            abort(404);

        return view('forum.comments.edit', ['comment'=> $comment]);
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
        $validated = $request->validate([
            'nickname' => 'required|max:30',
            'comm_text' => 'required',
            'post_id' => 'required|integer',
            'carma' => 'required|integer',
        ]);
        settype($validated['post_id'], "integer");

        $comment = ForumComment::where('comm_id', $id)->first();
        if(empty($comment))
            abort(404);
        $comment->fill($validated);
        $comment->save();
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
        $deletedComment = ForumComment::where('comm_id', $id)->first();
        if(empty($deletedComment))
            abort(404);
        $deletedComment->delete();
        return redirect()->route('user_index');
    }

    public function clickCarma(Request $request, $id) {
        $value = $request['carma_value'];
        settype($value, "integer");
        $comment = ForumComment::where('comm_id', $id)->first();
        $post_id = $comment->post_id;
        $comment->carma = (int)($comment->carma) + $value;
        $comment->save();
        return redirect()->route('posts.show', $post_id);
    }
}
