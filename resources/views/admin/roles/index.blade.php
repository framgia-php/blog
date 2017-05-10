@extends('admin.master')

@section('heading')
<section class="content-header">
    <h1>
        {{ trans('view.roles_management') }}
        <small>{{ trans('view.roles_view') }}</small>
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
                {{ trans('view.roles_create') }}
            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                            <a href="{{ route('admin.roles.create') }}"
                                title="{{ trans('view.new_role') }}"
                                class="btn btn-default">
                                {{ trans('view.new_role') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive table-content">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="active">
                            <th>#</th>
                            <th>Label</th>
                            <th>Description</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @empty($roles->all())
                            @include('admin._components.empty_rows', ['columns' => 4])
                        @else
                            @each('admin.roles.components.role', $roles, 'role')
                        @endempty
                    </tbody>
                </table>
            </div>
        </div>

        <div class="box-footer">
            <div class="text-right">
                {{ $roles->appends(request()->all())->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
