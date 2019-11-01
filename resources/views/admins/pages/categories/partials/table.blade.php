<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>NAME</th>
        <th>ICON</th>
        <th>EDIT</th>
        <th>DELETE</th>
        @if($type == 'pinned')
            <th>PIN</th>
        @else
            @can('bePinned', $categories[0])
                <th>PIN</th>
            @endcan
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->getFaIconName()}}</td>
            <td>
                <a class="btn btn-warning"
                   href="{{route('admin.categories.edit', ['category' => $category])}}">
                    Edit
                </a>
            </td>
            <td>
                <form action="{{route('admin.categories.destroy', ['category' => $category])}}"
                      method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
            @if($type == 'pinned')
                @include('admins.pages.categories.partials.pin-button')
            @else
                @can('bePinned', $category)
                    @include('admins.pages.categories.partials.pin-button')
                @endcan
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
