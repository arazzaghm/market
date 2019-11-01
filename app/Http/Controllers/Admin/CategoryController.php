<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CreateCategoryRequest;
use App\Http\Requests\Admin\Category\EditCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();

        $categories = Category::where('is_pinned', false)->paginate(50);

        $totalPinnedCategories = Category::countPinned();

        $pinnedCategories = Category::where('is_pinned', true)->get();

        return view('admins.pages.categories.index', compact(
            'categories',
            'totalCategories',
            'pinnedCategories',
            'totalPinnedCategories'
        ));
    }

    public function create()
    {
        return view('admins.pages.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admins.pages.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('admin.categories.index');

    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }

    public function pin(Category $category)
    {
        $category->isNotPinned() ? $category->pin() : $category->unpin();

        return back();
    }
}
