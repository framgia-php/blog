<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentsController extends Controller
{
    /**
     * Store a new comment resource.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CommentRequest $request)
    {
        $type = $request->input('commentable_type');
        $types = config('setup.commentable_types');

        abort_unless(Arr::exists($types, $type), 404);

        $commentableId = $request->input('commentable_id');
        $commentableType = $types[$type];
        $commentable = app($commentableType)->findOrFail($commentableId);

        $attributes['content'] = $request->input('content');
        $attributes['user_id'] = $request->user()->id;
        $attributes['parent_id'] = $request->input('parent_id');

        $comment = new Comment($attributes);

        try {
            $commentable->comments()->save($comment);

            $comment->load('creator');

            $status = 200;
            $renderData['comment'] = $comment;
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.create_comment');
            $renderData['comment_html'] = view('sites._components.comment', ['comment' => $comment])->render();
        } catch (\Exception $e) {
            logger()->error($e);
            $status = 500;
            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.create_comment');
        }

        return response()->json($renderData, $status);
    }

    /**
     * Update an exist comment resource.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $attributes['content'] = $request->input('content');

        try {
            $comment->update($attributes);
            $status = 200;
            $renderData['comment'] = $comment;
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.update_comment');
        } catch (\Exception $e) {
            logger()->error($e);
            $status = 500;
            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.update_comment');
        }

        return response()->json($renderData);
    }

    /**
     * Delete an exist comment resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
            $status = 200;
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.destroy_comment');
        } catch (\Exception $e) {
            logger()->error($e);
            $status = 500;
            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.destroy_comment');
        }

        return response()->json($renderData, $status);
    }
}
