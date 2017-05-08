<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\Managers\CategoriesManager;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of categories resources.
     *
     * @param  \App\Contracts\Managers\CategoriesManager  $manager
     * @param  \Illuminate\Http\Request  $request
     */
    public function index(CategoriesManager $manager, Request $request)
    {
        $this->authorize('view', Category::class);
        
        $renderData = $manager->makeListingViewData($request);

        return view('admin.categories.index', $renderData);
    }
}
