@extends('admins.layouts.app')

@section('content')
    <div class="row clearfix ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Categories</h2>
                    <h5>Total Categories: {{ App\Models\Category::count()}} </h5>
                </div>

                <div class="body table-responsive">
                    {{ $categories->links() }}

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>ICON</th>
                            <th>EDIT</th>
                            <td>DELETE</td>
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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
