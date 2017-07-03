@extends('admin.master')

@push('scripts')
    @include('admin.roles.components.scripts')
@endpush

@section('heading')
<section class="content-header">
    <h1>
        {{ trans('view.roles_management') }}
        <small>{{ trans('view.roles_create') }}</small>
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
    {{ Form::open(['route' => 'admin.roles.store']) }}
        <div class="row">
            <div class="col-md-8">
                @include('admin.roles.components.form')
            </div>

            <div class="col-md-4">
                @include('admin.roles.components.permissions', ['permissions' => $permissions])
            </div>
        </div>
    {{ Form::close() }}
</section>
@endsection
