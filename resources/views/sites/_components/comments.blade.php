{{-- form to create new comment --}}
<div class="comments">
    <div class="comment"
        data-comment-id="0"
        data-comment-parent-id="0"
        data-commentable-id="{{ $post->id }}"
        data-commentable-type="post">
        <div class="user">
            <a href="javascript:void(0)">
                {{ Html::image(Auth::user()->avatar_path, Auth::user()->fullname, ['class' => 'img-responsive']) }}
            </a>
        </div>
        <div class="info">
            <div class="title">
                {{ Auth::user()->fullname }}
            </div>
            <div class="reply">
                <textarea name="content" class="form-control" rows="2"></textarea>
                <div class="actions">
                    <div class="text-right">
                        <button type="button" class="btn btn-default btn-xs btn-cancel">
                            {{ trans('view.cancel') }}
                        </button>
                        <button type="button" class="btn btn-info btn-xs btn-reply" data-comment-id="0">
                            {{ trans('view.save') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- list comments --}}
<div class="comments">
    <div id="new-comments"></div>
    @foreach($comments as $comment)
        <div class="comment"
            data-comment-id="{{ $comment->id }}"
            data-comment-parent-id="{{ $comment->parent_id }}"
            data-commentable-id="{{ $comment->commentable_id }}"
            data-commentable-type="post">
            <div class="user">
                <a href="{{ route('sites.users.show', [$comment->creator->username]) }}">
                    {{ Html::image($comment->creator->avatar_path, $comment->creator->fullname, ['class' => 'img-responsive']) }}
                </a>
            </div>
            <!-- /.user -->
            <div class="info">
                <div class="title">
                    {{ $comment->creator->fullname }}
                </div>
                <!-- /.title -->

                <div class="text">
                    <p class="content">{{ $comment->content }}</p>
                    <div class="buttons">
                        <a href="javascript:void(0)" class="button-reply" data-comment-id="{{ $comment->id }}">
                            <i class="fa fa-reply"></i>
                            <span>{{ trans('view.reply') }}</span>
                        </a>
                        @can('update', $comment)
                            <a href="javascript:void(0)" class="button-edit" data-comment-id="{{ $comment->id }}">
                                <i class="fa fa-pencil"></i>
                                <span>{{ trans('view.edit') }}</span>
                            </a>
                        @endcan
                        @can('delete', $comment)
                            <a href="javascript:void(0)" class="button-delete" data-comment-id="{{ $comment->id }}">
                                <i class="fa fa-trash"></i>
                                <span>{{ trans('view.delete') }}</span>
                            </a>
                        @endcan
                    </div>
                </div>
                <!-- /.text -->

                @can('update', $comment)
                    <div class="edit hide">
                        <textarea name="content" class="form-control" rows="2"></textarea>
                        <div class="actions">
                            <div class="text-right">
                                <button type="button" class="btn btn-default btn-xs btn-cancel">
                                    {{ trans('view.cancel') }}
                                </button>
                                <button type="submit" class="btn btn-info btn-xs btn-edit" data-comment-id="{{ $comment->id }}">
                                    {{ trans('view.save')}}
                                </button>    
                            </div>
                        </div>
                    </div>
                @endcan

                <div class="children"></div>
                
                <div class="reply hide">
                    <textarea name="content" class="form-control" rows="2"></textarea>
                    <div class="actions">
                        <div class="text-right">
                            <button type="button" class="btn btn-default btn-xs btn-cancel" data-comment-id="{{ $comment->id }}">
                                {{ trans('view.cancel') }}
                            </button>
                            <button type="button" class="btn btn-info btn-xs btn-reply" data-comment-id="{{ $comment->id }}">
                                {{ trans('view.save') }}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.reply -->
            </div>
        </div>
        <div class="clearfix comment-divider"></div>
    @endforeach
</div>
