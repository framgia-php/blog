@extends('sites.master')

@section('content')
    <div id="main">
        <div class="container">
            <div class="page-heading">
                <h1 class="page-header">
                    @if (request()->has('keyword'))
                        {{ trans('view.search_for_keyword', ['type' => trans('view.' . request()->query('find_by'))]) }}
                        <span>:</span>
                        {{ request()->query('keyword') }}
                    @else
                        {{ trans('view.latest_posts') }}
                    @endif
                </h1>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <form action="{{ route('sites.posts.index') }}" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-3">
                                {{ Form::select('find_by', config('setup.find_posts_by'), request()->query('find_by'), ['class' => 'form-control']) }}
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" value="{{ request('keyword') }}"/>
                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="posts-list">
                        @each('sites.posts.components.post', $posts, 'post')

                        <div class="text-center">
                            {{ $posts->appends(request()->all())->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div id="sidebar">
                        <div class="section">
                            <h3 class="section-title">
                                {{ trans('view.trending_posts') }}
                            </h3>
                            <div class="section-content">
                                <div class="trending-posts">
                                    @each('sites._components.trending_post', $trendingPosts, 'post')
                                </div>
                            </div>
                        </div>
                        <div class="section">
                            <h3 class="section-title">
                                {{ trans('view.popular_tags') }}
                            </h3>
                            <div class="section-content">
                                <ul class="list-inline tags">
                                    @each('sites._components.popular_tag', $popularTags, 'tag')
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
