<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Contracts\Managers\PostsManager;
use App\Contracts\Repositories\CategoriesRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;

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

    public function create(Request $request)
    {
        $this->authorize('create', Post::class);

        $tags = Tag::pluck('title', 'id');
        $categories = app(CategoriesRepository::class)->getRecursiveCategoriesOptions();

        $renderData = compact('tags', 'categories');

        return view('admin.posts.create', $renderData);
    }

    public function store(PostRequest $request)
    {
        $this->authorize('create', Post::class);

        $attributes = $this->getFormatAttributes($request);

        DB::beginTransaction();

        try {
            $post = $this->storePostWithTags($attributes);

            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.create_post');

            DB::commit();
        } catch (\Exception $e) {
            logger()->error($e);

            DB::rollback();

            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.success.create_post');
        }

        return redirect()->route('admin.posts.index')->with($renderData);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $tags = Tag::pluck('title', 'id');
        $tagsSelected = $post->tags()->pluck('id');
        $categories = app(CategoriesRepository::class)->getRecursiveCategoriesOptions();

        $renderData = compact('post', 'tags', 'categories', 'tagsSelected');

        return view('admin.posts.edit', $renderData);
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $attributes = $this->getFormatAttributes($request);

        DB::beginTransaction();

        try {
            $post = $this->updatePostWithTags($post, $attributes);

            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.update_post');

            DB::commit();
        } catch (\Exception $e) {
            logger()->error($e);

            DB::rollback();

            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.update_post');
        }

        return redirect()->route('admin.posts.index')->with($renderData);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        try {
            $post->delete();
            $status = 200;
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.delete_post');
        } catch (\Exception $e) {
            $status = 500;
            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.delete_post');
        }

        return response()->json($renderData, $status);
    }

    protected function storePostWithTags(array $attributes)
    {
        $post = Post::create($attributes);

        if (isset($attributes['tag_ids'])) {
            $post->tags()->attach($attributes['tag_ids']);
        }

        return $post;
    }

    protected function updatePostWithTags(Post $post, array $attributes)
    {
        $post->update($attributes);

        if (isset($attributes['tag_ids'])) {
            $post->tags()->sync($attributes['tag_ids']);
        }

        return $post;
    }

    protected function getFormatAttributes(PostRequest $request)
    {
        $attributes['title'] = $title = $request->input('title');
        $attributes['slug'] = Str::slug($title) . '-' . time();
        $attributes['active'] = boolval($request->input('active', true));
        $attributes['is_trending'] = boolval($request->input('is_trending', false));
        $attributes['category_id'] = $request->input('category_id');
        $attributes['tag_ids'] = $request->input('tag_ids', []);
        $attributes['summary'] = $request->input('summary');
        $attributes['content'] = $request->input('content');
        $attributes['user_id'] = $request->user()->id;
        $attributes['published_at'] = date('Y-m-d H:i:s');

        return $attributes;
    }
}
