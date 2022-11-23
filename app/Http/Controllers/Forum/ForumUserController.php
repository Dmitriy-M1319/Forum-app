<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumUserController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('forum.user.index', ['user' => $user]);
    }
}
