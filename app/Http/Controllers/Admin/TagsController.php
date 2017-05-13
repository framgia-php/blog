<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Contracts\Managers\TagsManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;

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

    public function create()
    {
        $this->authorize('create', Tag::class);

        return view('admin.tags.create');
    }

    public function store(TagRequest $request)
    {
        $this->authorize('create', Tag::class);

        $attributes['title'] = $title = $request->input('title');
        $attributes['slug'] = Str::slug($title) . '-' . time();
        $attributes['user_id'] = $request->user()->id;

        try {
            Tag::create($attributes);
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.create_tag');
        } catch (\Exception $e) {
            dd($e);
            logger()->error($e);
            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.create_tag');
        }

        return redirect()->route('admin.tags.index')->with($renderData);
    }

    public function edit(Tag $tag)
    {
        $this->authorize('update', $tag);

        $renderData = compact('tag');

        return view('admin.tags.edit', $renderData);
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $this->authorize('update', $tag);

        $attributes['title'] = $title = $request->input('title');
        $attributes['slug'] = Str::slug($title) . '-' . time();

        try {
            $tag->update($attributes);
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.update_tag');
        } catch (\Exception $e) {
            logger()->error($e);
            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.update_tag');
        }

        return redirect()->route('admin.tags.index')->with($renderData);
    }

    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.delete_tag');
            $renderData['redirect'] = route('admin.tags.index');
        } catch (\Exception $e) {
            logger()->error($e);
            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.delete_tag');
        }

        return response()->json($renderData);
    }
}
