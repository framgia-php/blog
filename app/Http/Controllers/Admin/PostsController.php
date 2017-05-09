<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\Managers\PostsManager;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of posts resources.
     *
     * @param  \App\Contracts\Managers\PostsManager
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(PostsManager $manager, Request $request)
    {
        $this->authorize('view', Post::class);

        $renderData = $manager->makeListingViewData($request);

        return view('admin.posts.index', $renderData);
    }
}
