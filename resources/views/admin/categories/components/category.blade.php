<tr>
    <td class="text-center">{{ $category->id }}</td>
    <td>{{ $category->title }}</td>
    <td>
        <input type="text" class="form-control text-right" value="{{ $category->position }}"/>
    </td>
    <th class="text-center">
        @include('admin._components.active_locked', ['active' => $category->active])
    </th>
    <td class="text-center">
        <a href="#" class="btn btn-default btn-xs">
            <i class="fa fa-pencil"></i>
        </a>
        <a href="#" class="btn btn-danger btn-xs">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>
