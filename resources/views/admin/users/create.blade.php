@extends('admin.master')

@section('title', trans('view.users_create'))

@section('heading')
<section class="content-header">
    <h1>
        {{ trans('view.users_management') }}
        <small>{{ trans('view.users_create') }}</small>
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
                {{ trans('view.users_create') }}
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
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    {{ Form::open(['route' => 'admin.users.store']) }}
                        @include('admin.users.components.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
