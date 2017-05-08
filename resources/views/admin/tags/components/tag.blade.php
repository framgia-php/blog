<tr>
    <td class="text-center">{{ $tag->id }}</td>
    <td>{{ $tag->title }}</td>
    <td class="text-right">{{ $tag->posts_count }}</td>
    <td class="text-center">{{ $tag->created_at }}</td>
    <td>{{ $tag->creator->fullname }}</td>
    <td class="text-center">
        <a href="#" class="btn btn-default btn-xs">
            <i class="fa fa-pencil"></i>
        </a>
        <a href="#" class="btn btn-danger btn-xs">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>
