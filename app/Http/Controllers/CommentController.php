<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
/*        $comments = \App\Models\Comment::all();
        return view('comment.index', compact('comments'));*/
        return Comment::all();
    }

    public function create()
    {
        return view('comment.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        \App\Models\Comment::create($data);
        return redirect()->route('comments.index');
    }
}
