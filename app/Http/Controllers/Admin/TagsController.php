<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Contracts\Managers\TagsManager;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * Display a listing of tags resources.
     *
     * @param  \App\Contracts\Managers\TagsManager  $manager
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(TagsManager $manager, Request $request)
    {
        $this->authorize('view', Tag::class);

        $renderData = $manager->makeListingViewData($request);

        return view('admin.tags.index', $renderData);
    }
}
