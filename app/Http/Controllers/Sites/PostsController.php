<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Support\BuildQuery;

class PostsController extends Controller
{
    use BuildQuery;

    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $keyword = $this->replaceLikeEscapeString($keyword);

        $findBy = $request->query('find_by');

        if ($findBy === 'author') {
            $query = Post::whereHas('creator', function ($query) use ($keyword) {
                $query->where('fullname', 'like', $keyword);
                $query->orWhere('username', 'like', $keyword);
                $query->orWhere('email', 'like', $keyword);
            });
        } elseif ($findBy === 'tags') {
            $query = Post::whereHas('tags', function ($query) use ($keyword) {
                $query->where('title', 'like', $keyword);
            });
        } else {
            $query = Post::where('title', 'like', $keyword);
        }

        $posts = $query->paginate(config('setup.home_posts_limit'));

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

        $renderData = compact('posts', 'trendingPosts', 'popularTags');

        return view('sites.posts.index', $renderData);
    }

    /**
     * Show the detail of a user's post
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function show(User $user, Post $post)
    {
        $post->load('creator')->load('tags')->load([
            'comments' => function ($query) {
                $query->latest()
                    ->limit(config('setup.default_post_comments_limit'));
            },
        ]);

        $trendingPosts = Post::query()
            ->active()
            ->trending()
            ->limit(config('setup.default_trending_comments_limit'))
            ->get();

        $tags = Tag::withCount('posts')
            ->latest()
            ->limit(config('setup.default_tag_limit'))
            ->get();

        $renderData = compact('user', 'post', 'tags', 'trendingPosts');

        return view('sites.posts.show', $renderData);
    }
}
