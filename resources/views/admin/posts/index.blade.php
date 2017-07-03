@extends('admin.master')

@section('title', trans('view.posts_view'))

@section('heading')
<section class="content-header">
    <h1>
        {{ trans('view.posts_management') }}
        <small>{{ trans('view.posts_view') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('sites.home.index') }}" title="{{ trans('view.home') }}">
                <i class="fa fa-home"></i> {{ trans('view.home') }}
            </a>
        </li>
    </ol>
</section>
@endsection

@section('content')
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                {{ trans('view.posts_view') }}
            </h3>
            <div class="box-tools pull-right">
                <button type="button"
                    class="btn btn-box-tool"
                    title="Collapse"
                    data-widget="collapse"
                    data-toggle="tooltip"
                >
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="box-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        @include('admin._components.table_search')
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <a href="{{ route('admin.posts.create') }}" class="btn btn-default btn-sm">
                                {{ trans('view.new_post') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive table-content">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="active">
                            <th class="text-center">#</th>
                            <th>{{ trans('view.thead.title') }}</th>
                            <th class="text-right">{{ trans('view.thead.created_at') }}</th>
                            <th>{{ trans('view.thead.creator') }}</th>
                            <th class="text-center">{{ trans('view.thead.active') }}</th>
                            <th class="text-center">{{ trans('view.thead.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @empty($posts->all())
                            @include('admin._components.empty_rows', ['columns' => 5])
                        @else
                            @each('admin.posts.components.post', $posts, 'post')
                        @endempty
                    </tbody>
                </table>
            </div>
        </div>

        <div class="box-footer">
            <div class="text-right">
                {{ $posts->appends(request()->all())->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
