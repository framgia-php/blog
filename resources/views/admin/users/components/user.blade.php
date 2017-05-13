<tr>
    <td class="text-center">{{ $user->getKey() }}</td>
    <td>{{ $user->fullname }}</td>
    <td>{{ $user->username }}</td>
    <td>{{ $user->email }}</td>
    <td class="text-center">@include('admin._components.active_locked', ['active' => $user->active])</td>
    <td class="text-center">{{ trans($user->type) }}</td>
    <td class="text-center">
        @if (Auth::user()->can('update', $user))
            <a href="{{ route('admin.users.edit', $user) }}"
                class="btn btn-default btn-xs">
                <i class="fa fa-pencil"></i> {{ trans('view.edit') }}
            </a>
        @endif
        @if (Auth::user()->can('delete', $user))
            <a href="{{ route('admin.users.destroy', $user) }}"
                class="btn btn-danger btn-xs btn-delete-resource"
                confirm-message="{{ trans('message.confirm_user_delete') }}">
                <i class="fa fa-trash"></i> {{ trans('view.delete') }}
            </a>
        @endif
    </td>
</tr>
