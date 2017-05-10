<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('view.new_role') }}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="box-body">
        <div class="form-horizontal">
            <div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
                <label for="" class="col-md-3 control-label">
                    {{ trans('view.thead.role_label') }}
                </label>
                <div class="col-md-9">
                    {{ Form::text('label', null, [
                        'id' => 'label',
                        'class' => 'form-control',
                        'placeholder' => trans('view.placeholder.role_label'),
                    ]) }}
                    <span class="help-block">{{ $errors->first('label') }}</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">
                    {{ trans('view.thead.description') }}
                </label>
                <div class="col-md-9">
                    {{ Form::textarea('description', null, [
                        'id' => 'description',
                        'class' => 'form-control',
                        'placeholder' => trans('view.placeholder.description'),
                    ]) }}
                    <span class="help-block">{{ $errors->first('description') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="box-footer">
        <div class="text-right">
            <a href="{{ route('admin.roles.index') }}" title="{{ trans('view.canel') }}">
                {{ trans('view.cancel') }}
            </a>
            <button type="submit" class="btn btn-success" title="{{ trans('view.save') }}">
                {{ trans('view.save') }}
            </button>
        </div>
    </div>
</div>
