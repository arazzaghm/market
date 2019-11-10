<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostPictureController extends Controller
{
    /**
     * @param Post $post
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Post $post)
    {
        $post->getFirstMedia('picture')->delete();

        return back();
    }
}
