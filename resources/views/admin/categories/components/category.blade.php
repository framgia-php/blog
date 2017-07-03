<tr>
    <td class="text-center">{{ $category->id }}</td>
    <td>{{ $category->title }}</td>
    <td>
        <input type="text" class="form-control text-right" value="{{ $category->position }}"/>
    </td>
    <th class="text-center">
        @include('admin._components.active_locked', ['active' => $category->active])
    </th>
    @if(Auth::user()->can('update', $category) && Auth::user()->can('delete', $category))
        <td class="text-center">
            @can('update', $category)
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-default btn-xs">
                    <i class="fa fa-pencil"></i>
                </a>
            @endcan
            @can('delete', $category)
                <a href="{{ route('admin.categories.destroy', $category->id) }}" class="btn btn-danger btn-xs btn-delete-resource">
                    <i class="fa fa-trash"></i>
                </a>
            @endcan
        </td>
    @endif
</tr>
