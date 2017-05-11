<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Contracts\Managers\CategoriesManager;
use App\Contracts\Repositories\CategoriesRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of categories resources.
     *
     * @param  \App\Contracts\Managers\CategoriesManager  $manager
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(CategoriesManager $manager, Request $request)
    {
        $this->authorize('view', Category::class);

        $renderData = $manager->makeListingViewData($request);

        return view('admin.categories.index', $renderData);
    }

    /**
     * Display a listing of categories resources.
     *
     * @param  \App\Contracts\Managers\CategoriesManager  $manager
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(CategoriesManager $manager, Request $request)
    {
        $this->authorize('create', Category::class);

        $renderData = $manager->makeCreateViewData($request);

        return view('admin.categories.create', $renderData);
    }

    /**
     * Store a new category resource.
     *
     * @param  \App\Contracts\Managers\CategoriesManager  $manager
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function store(CategoriesManager $manager, CategoryRequest $request)
    {
        $this->authorize('create', Category::class);

        $renderData = $manager->createNewCategory($request);

        return redirect()->route('admin.categories.index')->with($renderData);
    }

    public function edit(CategoriesRepository $categoriesRepository, Category $category)
    {
        $this->authorize('update', $category);

        $categoriesOptions = $categoriesRepository->getRecursiveCategoriesOptions();

        $renderData = compact('category', 'categoriesOptions');

        return view('admin.categories.edit', $renderData);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->authorize('update', $category);

        $attributes['title'] = $title = $request->input('title');
        $attributes['slug'] = Str::slug($title);
        $attributes['parent_id'] = $request->input('parent_id', 0);
        $attributes['active'] = boolval($request->input('active', false));
        $attributes['position'] = intval($request->input('position', 1));
        $attributes['description'] = $request->input('description');

        try {
            $category->update($attributes);
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.update_category');
        } catch (\Exception $e) {
            logger()->error($e);
            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.update_category');
        }

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

        try {
            $category->delete();
            $status = 200;
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.delete_category');
        } catch (\Exception $e) {
            logger()->error($e);
            $status = 500;
            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.delete_category');
        }

        return response()->json($renderData, $status);
    }
}
