<form class="form-inline">
    <div class="form-group">
        <input type="text"
            name="keyword"
            class="form-control"
            placeholder="{{ trans('view.keyword') }}"
            value="{{ request('keyword') }}"
        />
        <input type="submit"
            class="btn btn-info"
            title="{{ trans('view.search') }}"
            value="{{ trans('view.search') }}"
        />
    </div>
</form>
