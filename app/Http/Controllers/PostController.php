<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Requests\Post\CreatePostRequest;
use App\Mail\User\ArchivedPostMail;
use App\Mail\User\DeletedPostMail;
use App\Mail\User\NewPostMail;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Currency;
use App\Models\Post;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Category|null $category
     * @return Response
     */
    public function index(?Category $category)
    {
        $query = Post::where('status', '!=', Post::STATUS_HIDDEN);

        if ($category->id !== null) {
            $query->where('category_id', $category->id);
        }

        $posts = $query->paginate(12);

        return view('pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $allCategories = Category::all();

        $allCurrencies = Currency::all();

        return view('pages.posts.create', compact('allCategories', 'allCurrencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     * @return Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = Auth::user()->posts()->create($request->validated());

        if ($request->hasFile('picture')) {
            $post->addMedia($request->picture)->withResponsiveImages()->toMediaCollection('picture');
        }

        \Mail::to(Auth::user()->email)->send(
            new NewPostMail($post)
        );

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
     * @throws AuthorizationException
     */
    public function show(Category $category, Post $post)
    {
        $this->authorize('view', $post);

        if ($post->authIsOwner()) {
            $allCurrencies = Currency::all();
            $allCategories = Category::all();
        } else {
            $allCurrencies = null;
            $allCategories = null;
        }

        if (Auth::id() != $post->user_id) {
            $post->increment('viewed_times');
        }

        $media = $post->getPictureUrl();

        $reportTypes = $post->reportTypes()->get();

        $comments = $post->comments()->orderByDesc('created_at')->paginate(5);

        return view('pages.posts.show', compact(
            'post',
            'comments',
            'reportTypes',
            'media',
            'allCurrencies',
            'allCategories'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return void
     * @throws Exception
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
     * @throws AuthorizationException
     */
    public function destroy(Post $post)
    {
        $this->authorize('update', $post);

        \Mail::to(Auth::user()->email)->send(
            new DeletedPostMail()
        );

        $post->delete();

        return redirect()->route('users.show', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Hides and unhides post.
     *
     * @param Post $post
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function hide(Post $post)
    {
        $this->authorize('update', $post);

        $post->isHidden() ? $post->unhide() : $post->hide();

        return back();
    }

    /**
     * Archives the post.
     *
     * @param Post $post
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function archive(Post $post)
    {
        $this->authorize('archive', $post);

        $post->archive();

        \Mail::to(Auth::user()->email)->send(
            new ArchivedPostMail($post)
        );

        return back();
    }
}
