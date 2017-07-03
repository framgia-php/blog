<tr>
    <td class="text-center">{{ $role->id }}</td>
    <td>{{ $role->label }}</td>
    <td>{{ $role->description }}</td>
    <td class="text-center">
        @if ($role->editable && Auth::user()->can('update', $role))
            <a href="{{ route('admin.roles.edit', $role) }}"
                class="btn btn-default btn-xs">
                <i class="fa fa-pencil"></i> {{ trans('view.edit') }}
            </a>
        @endif
        @if ($role->deleteable && Auth::user()->can('delete', $role))
            <a href="{{ route('admin.roles.destroy', $role) }}"
                class="btn btn-danger btn-xs btn-delete-resource"
                confirm-message="{{ trans('message.confirm_role_delete') }}">
                <i class="fa fa-trash"></i> {{ trans('view.delete') }}
            </a>
        @endif
    </td>
</tr>
