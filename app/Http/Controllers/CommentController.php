<?php

namespace App\Http\Controllers;

use App\Http\Comment\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        if ($request->anonymous) {
            $data['anonymous'] = true;
        } else {
            $data['anonymous'] = false;
        }

        $post->comments()->create($data);

        return back();
    }
}
