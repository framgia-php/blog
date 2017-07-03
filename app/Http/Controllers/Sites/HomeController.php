<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;

class HomeController extends Controller
{
    /**
     * Display home page.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $latestPosts = Post::with('creator')
            ->withCount('comments')
            ->active()
            ->latest()
            ->paginate(config('setup.home_posts_limit'));

        $trendingPosts = Post::with('creator')
            ->withCount('comments')
            ->trending()
            ->active()
            ->latest()
            ->limit(config('setup.home_trending_posts_limit'))
            ->get();

        $popularTags = Tag::withCount('posts')
            ->has('posts')
            ->get()
            ->sortByDesc('posts_count')
            ->take(config('setup.home_tags_limit'));

        $renderData = compact('posts', 'latestPosts', 'trendingPosts', 'popularTags');

        return view('sites.home.index', $renderData);
    }
}
