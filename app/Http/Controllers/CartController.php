<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\CartService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    private $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
    }

    /**
     * Shows posts.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function show(Request $request)
    {
        $posts = $this->cartService->getPosts($request);

        return view('pages.cart.show', compact('posts'));
    }

    /**
     * Adds post to cart.
     *
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function add(Request $request, Post $post)
    {
        $this->cartService->addPost($request, $post);

        return back();
    }

    /**
     * Deletes post from cart.
     *
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function delete(Request $request, Post $post)
    {
        $this->cartService->deletePost($request, $post);

        return back();
    }

    /**
     * Truncates cart.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function clear(Request $request)
    {
        $request->session()->forget('posts');

        return back();
    }
}
