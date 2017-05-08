@extends('sites.master')

@php
    $comments = App\Models\Comment::limit(3)->get();
@endphp

@section('content')
    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-detail">
                        <h1 class="title">
                            [Become a SuperUser - Part 0] Unix vs Linux. Nguồn gốc và sự khác biệt
                        </h1>
                        <ul class="list-inline tags">
                            <li>
                                <a href="javascript:void(0)" class="label label-info">
                                    Editor's choice
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="label label-info">
                                    PHP
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="label label-info">
                                    Javascript
                                </a>
                            </li>
                        </ul>
                        <div class="short-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="fa fa-pencil"></span> Nguyen Xuan Quynh
                                    <span>&nbsp;&nbsp;</span>
                                    <span class="fa fa-calendar"></span> 01:01 01/01/2017
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right">
                                        <a href="javascript:void(0)" class="btn-move-to-comment">
                                            <span class="fa fa-comments-o"></span> 16
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="summary">
                            <h2 class="summary-title">Summary</h2>
                            <p class="summary-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>

                    <div class="comments">
                        @foreach($comments as $comment)
                        <div class="comment" data-comment-id="{{ $comment->id }}">
                            <div class="user">
                                <a href="javascript:void(0)">
                                    <img src="/img/default_avatar.png" alt="img-responsive">
                                </a>
                            </div>
                            <div class="info">
                                <div class="title">
                                    Nguyen Xuan Quynh
                                </div>
                                <div class="text">
                                    <p class="comment-content">Không hiểu nhưng vẫn thank you! =))</p>
                                    <div class="comment-content-edit hide">
                                        <textarea name="name" class="form-control">Không hiểu nhưng vẫn thank you! =))</textarea>
                                        <div class="actions text-right">
                                            <button type="button" class="btn btn-default btn-xs comment-button-cancel-edit" name="button">Cancel</button>
                                            <button type="button" class="btn btn-info btn-xs" name="button">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons">
                                <a href="javascript:void(0)" class="comment-button-reply" data-comment-id="{{ $comment->id }}">
                                    <i class="fa fa-reply"></i> Reply
                                </a>
                                <a href="javascript:void(0)" class="comment-button-edit" data-comment-id="{{ $comment->id }}">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </div>
                            <div class="reply hide">
                                <textarea name="name" class="form-control"></textarea>
                                <div class="actions text-right">
                                    <button type="button" class="btn btn-default btn-sm comment-button-cancel-reply" name="button">Cancel</button>
                                    <button type="button" class="btn btn-info btn-sm" name="button">Submit</button>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix comment-divider"></div>
                        @endforeach
                        <div class="comment comment-child">
                            <div class="user">
                                <a href="javascript:void(0)">
                                    <img src="/img/default_avatar.png" alt="img-responsive">
                                </a>
                            </div>
                            <div class="info">
                                <div class="title">
                                    Nguyen Xuan Quynh
                                </div>
                                <div class="text">
                                    <p>Không hiểu nhưng vẫn thank you! =))</p>
                                </div>
                            </div>
                            <div class="buttons">
                                <a href="javascript:void(0)">
                                    <i class="fa fa-reply"></i> Reply
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </div>
                            <div class="reply hide">
                                <textarea name="name" class="form-control"></textarea>
                                <div class="actions text-right">
                                    <button type="button" class="btn btn-default btn-sm" name="button">Cancel</button>
                                    <button type="button" class="btn btn-info btn-sm" name="button">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>
@endsection
