<tr>
    <td class="text-center">{{ $user->getKey() }}</td>
    <td>{{ $user->fullname }}</td>
    <td>{{ $user->email }}</td>
    <td class="text-center">@include('admin._components.active_locked', ['active' => $user->active])</td>
    <td class="text-center">
        <a href="#" class="btn btn-default btn-xs">
            <i class="fa fa-pencil"></i>
        </a>
        <a href="#" class="btn btn-danger btn-xs">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>
