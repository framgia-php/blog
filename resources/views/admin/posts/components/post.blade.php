<tr>
    <td class="text-center">{{ $post->getKey() }}</td>
    <td>{{ $post->title }}</td>
    <td class="text-right">{{ $post->created_at }}</td>
    <td>{{ $post->creator->fullname }}</td>
    <td class="text-center">
        @include('admin._components.active_locked', ['active' => $post->active])
    </td>
    <td class="text-center">
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-default btn-xs">
            <i class="fa fa-pencil"></i>
        </a>
        <a href="{{ route('admin.posts.destroy', $post->id) }}"
            confirm-message="{{ trans('message.confirm_post_delete') }}"
            class="btn btn-danger btn-xs btn-delete-resource">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>
