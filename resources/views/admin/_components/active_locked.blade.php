@if($active)
    <a href="#" class="btn btn-success btn-xs">
        {{ trans('view.yes') }}
    </a>
@else
    <a href="#" class="btn btn-danger btn-xs">
        {{ trans('view.no') }}
    </a>
@endif
