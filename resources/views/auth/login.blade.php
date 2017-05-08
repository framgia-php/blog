@extends('sites.master')

@section('content')
<div class="login-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ trans('view.please_signin') }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(['route' => 'auth.login.handle', 'class' => 'form-horizontal']) }}
                            <div class="form-group {{ $errors->has('email') || session()->has('error') ? 'has-error' : '' }}">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    {{ Form::text('email', null, [
                                        'id' => 'email',
                                        'placeholder' => trans('view.placeholder.email'),
                                        'class' => 'form-control',
                                    ]) }}
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                    <span class="help-block">{{ session('error') }}</span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    {{ Form::password('password', [
                                        'id' => 'password',
                                        'placeholder' => trans('view.placeholder.password'),
                                        'class' => 'form-control',
                                    ]) }}
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 col-md-offset-4">
                                    <div class="checkbox">
                                        <label for="remember">
                                            {{ Form::checkbox('remember', 1, false, ['id' => 'remember']) }}
                                            {{ trans('view.remember_me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <a href="#" class="btn btn-info btn-link">
                                        {{ trans('view.forgot_password') }} ?
                                    </a>
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
