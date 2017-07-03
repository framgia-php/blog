@push('scripts')
<script type="text/javascript">
    $('.select2').css({ width: '100%' });
    $('.select2').select2();
</script>
@endpush

<div class="form-horizontal">
    <div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
        <label for="fullname" class="col-md-3 control-label">
            {{ trans('view.fullname') }}
        </label>
        <div class="col-md-7">
            @isset($user)
                {{ Form::text('fullname', null, [
                    'class' => 'form-control',
                    'placeholder' => trans('view.placeholder.fullname'),
                    'disabled'
                ]) }}
            @else
                {{ Form::text('fullname', null, [
                    'class' => 'form-control',
                    'placeholder' => trans('view.placeholder.fullname'),
                ]) }}
            @endif
            <span class="help-block">{{ $errors->first('fullname') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
        <label for="username" class="col-md-3 control-label">
            {{ trans('view.username') }}
        </label>
        <div class="col-md-7">
            @isset($user)
                {{ Form::text('username', null, [
                    'class' => 'form-control',
                    'placeholder' => trans('view.placeholder.username'),
                    'disabled',
                ]) }}
            @else
                {{ Form::text('username', null, [
                    'class' => 'form-control',
                    'placeholder' => trans('view.placeholder.username'),
                ]) }}
            @endisset
            <span class="help-block">{{ $errors->first('username') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="email" class="col-md-3 control-label">
            {{ trans('view.email') }}
        </label>
        <div class="col-md-7">
            @isset($user)
                {{ Form::text('email', null, [
                    'class' => 'form-control',
                    'placeholder' => trans('view.placeholder.email'),
                    'disabled',
                ]) }}
            @else
                {{ Form::text('email', null, [
                    'class' => 'form-control',
                    'placeholder' => trans('view.placeholder.email'),
                ]) }}
            @endisset
            <span class="help-block">{{ $errors->first('email') }}</span>
        </div>
    </div>

    @if (! isset($user))
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password" class="col-md-3 control-label">
                {{ trans('view.password') }}
            </label>
            <div class="col-md-7">
                {{ Form::password('password', [
                    'class' => 'form-control',
                    'placeholder' => trans('view.placeholder.password'),
                ]) }}
                <span class="help-block">{{ $errors->first('password') }}</span>
            </div>
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="col-md-3 control-label">
                {{ trans('view.password_confirmation') }}
            </label>
            <div class="col-md-7">
                {{ Form::password('password_confirmation', [
                    'class' => 'form-control',
                    'placeholder' => trans('view.placeholder.password_confirmation'),
                ]) }}
            </div>
        </div>
    @endif

    <div class="form-group">
        <label for="email" class="col-md-3 control-label">
            {{ trans('view.thead.active') }}
        </label>
        <div class="col-md-7">
            <div class="checkbox">
                <label>
                    {{ Form::checkbox('active', true, isset($user) ? $user->active : false) }}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-md-3 control-label">
            {{ trans('view.user_type') }}
        </label>
        <div class="col-md-7">
            {{ Form::select('type', config('setup.user_types'), 2, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="col-md-3 control-label">
            {{ trans('view.choose_roles') }}
        </label>
        <div class="col-md-7">
            {{ Form::select('role_ids[]', $roles, isset($rolesSelected) ? $rolesSelected : null, ['class' => 'select2', 'multiple' => true]) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10 text-right">
            <a href="{{ route('admin.users.index') }}"
                title="{{ trans('view.cancel') }}"
                class="btn btn-default">
                {{ trans('view.cancel') }}
            </a>
            <button type="submit" class="btn btn-success" title="{{ trans('view.save') }}">
                {{ trans('view.save') }}
            </button>
        </div>
    </div>
</div>
