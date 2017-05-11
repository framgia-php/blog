<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;

class PostsController extends Controller
{
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
