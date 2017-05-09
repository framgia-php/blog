<div class="form-horizontal">
    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="col-md-4 control-label">
            {{ trans('view.thead.title') }}
        </label>
        <div class="col-md-8">
            {{ Form::text('title', null, [
                'id' => 'title',
                'class' => 'form-control',
                'placeholder' => trans('view.placeholder.title'),
            ]) }}
            <span class="help-block">{{ $errors->first('title') }}</span>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-4 control-label">
            {{ trans('view.thead.parent_category') }}
        </label>
        <div class="col-md-8">
            {{ Form::select('parent_id', $categoriesOptions, null, [
                'id' => 'parent_id',
                'class' => 'form-control',
            ]) }}
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-4 control-label">
            {{ trans('view.thead.position') }}
        </label>
        <div class="col-md-2">
            {{ Form::number('position', 1, ['class' => 'form-control input-sm text-right']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-4 control-label">
            {{ trans('view.thead.active') }}
        </label>
        <div class="col-md-8">
            <div class="checkbox">
                <label>
                    {{ Form::checkbox('active', true) }}
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-4 control-label">
            {{ trans('view.thead.description') }}
        </label>
        <div class="col-md-8">
            <textarea name="name" class="form-control" rows="8"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <div class="text-right">
                <a href="{{ route('admin.categories.index') }}"
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
</div>
