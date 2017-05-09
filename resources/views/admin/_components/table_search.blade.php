<form class="form-inline">
    <div class="form-group">
        <input type="text"
            name="keyword"
            class="form-control input-sm"
            placeholder="{{ trans('view.keyword') }}"
            value="{{ request('keyword') }}"
        />
        <input type="submit"
            class="btn btn-info btn-sm"
            title="{{ trans('view.search') }}"
            value="{{ trans('view.search') }}"
        />
        <a href="{{ request()->url() }}"
            title="{{ trans('view.cancel') }}"
            class="btn btn-default btn-sm">
            {{ trans('view.cancel') }}
        </a>
    </div>
</form>
