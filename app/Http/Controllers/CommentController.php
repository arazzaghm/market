<?php

namespace App\Http\Controllers;

use App\Http\Comment\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentService;

    public function __construct()
    {
        $this->commentService = new CommentService();
    }

    public function store(CreateCommentRequest $request, Post $post)
    {
        $this->commentService->createComment($post, $request->validated(), $request->anonymous);

        return back();
    }
}
