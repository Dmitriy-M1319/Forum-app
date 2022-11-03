<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreForumThreadRequest;
use App\Models\ForumThread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = DB::table('thread')->paginate(15);
        return view('forum.threads.index', ['threads' => $threads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.threads.create', ['thread' => new ForumThread(), 'message' => 'fail']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'theme' =>  'required|string'
        ]);
        $thread = ForumThread::create($valid);
        return redirect()->route('threads.show', $thread->thread_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread = ForumThread::where('thread_id', $id)->first();
        return view('forum.threads.show', ['thread' => $thread]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thread = ForumThread::where('thread_id', $id)->first();
        return view('forum.threads.edit', ['thread' => $thread]);
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
        $valid = $request->validate([
            'theme' =>  'required|string'
        ]);
        $newThread = ForumThread::where('thread_id', $id)->first();
        $newThread->theme = $valid['theme'];
        $newThread->save();
        return redirect()->route('threads.show', $newThread->thread_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedThread = ForumThread::where('thread_id', $id)->first();
        $id = $deletedThread->thread_id;
        $deletedThread->delete();
        return view('forum.threads.delete', ['deleted_thread_id' => $id]);
    }
}
