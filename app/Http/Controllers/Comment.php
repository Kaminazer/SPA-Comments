<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;

class Comment extends Controller
{
    public function index()
    {
        $comments = \App\Models\Comment::all();
        return view('comment.index', compact('comments'));
    }

    public function create()
    {
        return view('comment.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        \App\Models\Comment::create($data);
        return view('comment.create');
    }
}
