@extends('sites.master')

@push('styles')
<style>
    .sidebar-section-author .author-avatar {
        margin: auto;
    }
</style>
@endpush

@section('content')
<div id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post-detail">
                    <h1 class="title">
                        {{ $post->title }}
                    </h1>
                    <ul class="list-inline tags">
                        @foreach($post->tags as $tag)
                            <li>
                                <a href="javascript:void(0)" class="label label-info">
                                    {{ $tag->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="short-info">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="fa fa-pencil"></span> {{ $post->creator->fullname }}
                                <span>&nbsp;&nbsp;</span>
                                <span class="fa fa-calendar"></span> {{ $post->published_at }}
                            </div>
                            <div class="col-md-6">
                                <div class="text-right">
                                    <a href="javascript:void(0)" class="btn-move-to-comment">
                                        <span class="fa fa-comments-o"></span> {{ $post->comments()->count() }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="summary">
                        <h2 class="summary-title">Summary</h2>
                        <p class="summary-text">{!! $post->summary !!}</p>
                    </div>
                    <div class="content">
                        {!! $post->content !!}
                    </div>
                </div>

                @login
                    @include('sites._components.comments', [
                        'comments' => $post->comments,
                        'commentableId' => $post->id,
                    ])
                @endlogin
            </div>

            <div class="col-md-4">
                <div class="sidebar">
                    <div class="sidebar-section">
                        <h3 class="sidebar-section-title text-center">
                            {{ trans('view.author') }}
                        </h3>
                        <div class="sidebar-section-author">
                            <a href="{{ route('sites.users.show', ['username' => $user->username]) }}">
                                {{ Html::image($user->avatar_path, $user->fullname, ['class' => 'img-responsive author-avatar']) }}
                            </a>
                            <ul class="list-unstyled">
                                <li class="text-center">
                                    <a href="{{ route('sites.users.show', ['username' => $user->username]) }}">
                                        {{ $user->fullname }}
                                    </a>
                                </li>
                                <li class="text-center">
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-pencil"></i>
                                        {{ $user->posts()->count() }}
                                    </a>
                                </li>
                                @if(Auth::id() !== $user->getKey())
                                    <li class="text-center">
                                        {{ Form::open(['route' => ['sites.users.follow', Auth::id(), $user->getKey() ]]) }}
                                            <button type="submit" class="btn btn-default">
                                                {{ trans('view.follow') }}
                                            </button>
                                        {{ Form::close() }}
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    @if($trendingPosts->isNotEmpty())
                        <div class="sidebar-section">
                            <h3 class="sidebar-section-title">{{ trans('view.trending_posts') }}</h3>
                            <div class="sidebar-section-posts">
                                @foreach($trendingPosts as $post)
                                    <div class="post" style="margin-bottom: 30px;">
                                        <h4 class="post-info-title">
                                            <a href="{{ route('sites.posts.show', [$post->creator->username, $post->slug]) }}">{{ $post->title }}</a>
                                        </h4>
                                        <div class="post-info-publish">
                                            <a href="{{ route('sites.users.show', ['username' => $post->creator->username]) }}">
                                                {{ $post->creator->fullname }}
                                            </a>
                                            <span>&nbsp;&nbsp;&nbsp;</span>
                                            <span>{{ $post->published_at }}</span>
                                            <span>&nbsp;&nbsp;&nbsp;</span>
                                            <span>
                                                <i class="fa fa-comment-o"></i>
                                                {{ $post->comments()->count() }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($tags->isNotEmpty())
                        <div class="sidebar-section">
                            <h3 class="sidebar-section-title">{{ trans('view.tags') }}</h3>
                            <div class="sidebar-section-tags">
                                @foreach($tags as $tag)
                                    <div class="btn-group tag">
                                        <a href="{{ route('sites.tags.show', [$tag->slug]) }}" class="btn btn-default btn-sm">
                                            {{ $tag->title }}
                                        </a>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            {{ $tag->posts_count }}
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
