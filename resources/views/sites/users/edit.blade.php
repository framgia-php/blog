@extends('sites.master')

@push('scripts')
    <script type="text/javascript">
        @if(session('status') === 'success')
            toastr["success"]("{{ session('message') }}");
        @elseif(session('status') === 'failure')
            toastr["error"]("{{ session('error') }}");
        @endif
    </script>
@endpush

@section('content')
<div id="main">
    <div class="container login-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ trans('view.update_user_profile') }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        {{ Form::model($user, [
                            'route' => ['sites.users.update', 'username' => $user->username],
                            'method' => 'put',
                            'files' => true,
                            'class' => 'form-horizontal'
                        ]) }}
                            <div class="form-group">
                                <label class="col-md-4 control-label">
                                    {{ trans('view.avatar') }}
                                </label>
                                <div class="col-md-6">
                                    {{ Html::image($user->avatar_path, $user->fullname, [
                                        'width' => '100',
                                        'height' => '100',
                                    ]) }}
                                    {{ Form::file('avatar', null, ['id' => 'avatar']) }}
                                    <span class="help-block">{{ $errors->first('avatar') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">
                                    {{ trans('view.email') }}
                                </label>
                                <div class="col-md-6">
                                    {{ Form::text('email', null, [
                                        'class' => 'form-control',
                                        'placeholder' => trans('view.placeholder.email'),
                                        'disabled',
                                    ]) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">
                                    {{ trans('view.username') }}
                                </label>
                                <div class="col-md-6">
                                    {{ Form::text('username', null, [
                                        'class' => 'form-control',
                                        'placeholder' => trans('view.placeholder.username'),
                                        'disabled',
                                    ]) }}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
                                <label class="col-md-4 control-label">
                                    {{ trans('view.fullname') }}
                                </label>
                                <div class="col-md-6">
                                    {{ Form::text('fullname', null, [
                                        'id' => 'fullname',
                                        'class' => 'form-control',
                                        'placeholder' => trans('view.placeholder.fullname'),
                                    ]) }}
                                    <span class="help-block">{{ $errors->first('fullname') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {{ Form::submit(trans('view.login'), ['class' => 'btn btn-info']) }}
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
