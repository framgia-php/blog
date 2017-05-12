<div class="form-horizontal">
    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="col-md-3 control-label">
            {{ trans('view.thead.title') }}
        </label>
        <div class="col-md-7">
            {{ Form::text('title', null, [
                'id' => 'title',
                'class' => 'form-control',
                'placeholder' => trans('view.placeholder.title'),
            ]) }}
            <span class="help-block">{{ $errors->first('title') }}</span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <div class="text-right">
                <a href="{{ route('admin.categories.index') }}"
                    title="{{ trans('view.cancel') }}"
                    class="btn btn-default">
                    {{ trans('view.cancel') }}
                </a>
                @can('delete', $tag)
                    <a href="{{ route('admin.tags.destroy', $tag) }}"
                        class="btn btn-danger btn-delete-resource"
                        confirm-message="{{ trans('message.confirm_tag_delete') }}">
                        {{ trans('view.delete') }}
                    </a>
                @endif
                <button type="submit" class="btn btn-success" title="{{ trans('view.save') }}">
                    {{ trans('view.save') }}
                </button>
            </div>
        </div>
    </div>
</div>
