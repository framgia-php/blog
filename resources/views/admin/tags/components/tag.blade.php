<tr>
    <td class="text-center">{{ $tag->id }}</td>
    <td>{{ $tag->title }}</td>
    <td class="text-right">{{ $tag->posts_count }}</td>
    <td class="text-center">{{ $tag->created_at }}</td>
    <td>{{ $tag->creator->fullname }}</td>
    <td class="text-center">
        @if (Auth::user()->can('update', $tag))
            <a href="{{ route('admin.tags.edit', $tag) }}"
                class="btn btn-default btn-xs">
                <i class="fa fa-pencil"></i> {{ trans('view.edit') }}
            </a>
        @endif
        @if (Auth::user()->can('delete', $tag))
            <a href="{{ route('admin.tags.destroy', $tag) }}"
                class="btn btn-danger btn-xs btn-delete-resource"
                confirm-message="{{ trans('message.confirm_tag_delete') }}">
                <i class="fa fa-trash"></i> {{ trans('view.delete') }}
            </a>
        @endif
    </td>
</tr>
