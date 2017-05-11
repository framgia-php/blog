<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    {{ Form::text('title', null, [
        'class' => 'form-control',
        'placeholder' => trans('view.placeholder.title')
    ]) }}
    <span class="help-block">{{ $errors->first('title') }}</span>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
                <span class="help-block">{{ $errors->first('category_id') }}</span>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group {{ $errors->has('tag_ids') ? 'has-error' : '' }}">
                {{ Form::select('tag_ids[]', $tags, isset($tagsSelected) ? $tagsSelected : null, ['class' => 'select2', 'multiple']) }}
                <span class="help-block">{{ $errors->first('tag_ids') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-1">
            <div class="checkbox">
                <label>
                    {{ Form::checkbox('active', true, true) }}
                    {{ trans('view.thead.active') }}
                </label>
            </div>
        </div>
        <div class="col-md-1">
            <div class="checkbox">
                <label>
                    {{ Form::checkbox('is_trending', true, false) }}
                    {{ trans('view.thead.is_trending') }}
                </label>
            </div>
        </div>
        <div class="col-md-10">
            <div class="text-right">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-default">{{ trans('view.cancel') }}</a>
                <button type="submit" class="btn btn-success">{{ trans('view.save') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
    <label for="">{{ trans('view.summary') }}</label>
    {{ Form::textarea('summary', null, ['id' => 'js-post-summary']) }}
    <span class="help-block">{{ $errors->first('summary') }}</span>
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
    <label for="">{{ trans('view.content') }}</label>
    {{ Form::textarea('content', null, ['id' => 'js-post-content']) }}
    <span class="help-block">{{ $errors->first('content') }}</span>
</div>
