<td>
    <form action="{{route('admin.categories.pin', ['category' => $category])}}"
          method="POST">
        @csrf
        @method('PATCH')
        <button
            class="btn btn-success">{{$category->isPinned() ? 'Unpin' : 'Pin'}}</button>
    </form>
</td>
