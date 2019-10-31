<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Requests\Post\CreatePostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status', '!=', Post::STATUS_HIDDEN)->paginate(12);

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

        if ($request->hasFile('picture')) {
            $post->addMedia($request->picture)->withResponsiveImages()->toMediaCollection('picture');
        }

        return redirect()->route('posts.show', [
            'post' => $post,
            'category' => $post->category
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @param Post $post
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Category $category, Post $post)
    {
        $this->authorize('view', $post);

        if (Auth::id() != $post->user_id) {
            $post->increment('viewed_times');
        }

        $media = $post->getPictureUrl();

        $reportTypes = $post->reportTypes()->get();

        $comments = $post->comments()->orderByDesc('created_at')->paginate(5);

        return view('pages.posts.show', compact('post', 'comments', 'reportTypes', 'media'));
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
     * @throws \Exception
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        if ($post->hasMedia('picture') && $request->hasFile('picture')) {
            $post->getFirstMedia('picture')->delete();
        } elseif ($request->hasFile('picture')) {
            $post->addMedia($request->picture)->withResponsiveImages()->toMediaCollection('picture');
        }

        return redirect()->route('posts.show', [
            'post' => $post,
            'category' => $post->category
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
        $this->authorize('update', $post);

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
