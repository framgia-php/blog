<tr>
    <td class="text-center">{{ $post->getKey() }}</td>
    <td>{{ $post->title }}</td>
    <td class="text-right">{{ $post->created_at }}</td>
    <td>{{ $post->creator->fullname }}</td>
    <td class="text-center">
        @include('admin._components.active_locked', ['active' => $post->active])
    </td>
    <td class="text-center">
        <a href="#" class="btn btn-default btn-xs">
            <i class="fa fa-pencil"></i>
        </a>
        <a href="#" class="btn btn-danger btn-xs">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>
