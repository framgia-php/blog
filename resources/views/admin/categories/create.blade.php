@extends('admin.master')

@section('title', trans('view.categories_view'))

@section('heading')
<section class="content-header">
    <h1>
        {{ trans('view.categories_management') }}
        <small>{{ trans('view.categories_create') }}</small>
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
                {{ trans('view.categories_create') }}
            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="box-body">
            {{ Form::open(['route' => 'admin.categories.store']) }}
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @include('admin.categories.components.form')
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</section>
@endsection
