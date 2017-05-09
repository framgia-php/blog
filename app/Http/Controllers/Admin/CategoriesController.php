<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\Managers\CategoriesManager;
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
}
