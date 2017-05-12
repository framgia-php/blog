<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('view.select_permission') }}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="box-body">
        <ul class="list-group js-permissions-list">
            @foreach ($permissions as $permission)
                <li class="list-group-item">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"
                                name="permission_ids[]"
                                value="{{ $permission->id }}"
                                {{ in_array($permission->id, $permissionsChecked) ? 'checked' : '' }}/>
                            <strong>{{ $permission->label }}</strong>
                        </label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
