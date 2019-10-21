<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Requests\Post\CreatePostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(12);

        return view('pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();

        return view('pages.posts.create', compact('allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->validated());

        return redirect()->route('posts.show', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);

        $post->increment('viewed_times');

        $comments = $post->comments()->orderByDesc('created_at')->paginate(5);

        return view('pages.posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $allCategories = Category::all();

        return view('pages.posts.edit', compact('allCategories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return void
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return redirect()->route('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Post $post)
    {
        $this->authorize('edit', $post);

        $post->delete();

        return redirect()->route('users.show', [
            'user' => auth()->user()
        ]);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function hide(Post $post)
    {
        $this->authorize('update', $post);

        $post->isHidden() ? $post->unhide() : $post->hide();

        return back();
    }
}
