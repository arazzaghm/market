@extends('admins.layouts.app')

@section('content')
    <div class="row clearfix ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Popular questions</h2>
                    <h5>Total Report types: {{ $totalPopularQuestions}} </h5>
                    <a href="{{route('admin.popular-questions.create')}}" class="btn btn-success">Create</a>
                </div>

                <div class="body table-responsive">
                    {{ $popularQuestions->links() }}

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>EDIT</th>
                            <td>DELETE</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($popularQuestions as $popularQuestion)
                            <tr>
                                <td>{{$popularQuestion->id}}</td>
                                <td>{{$popularQuestion->title}}</td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="{{route('admin.popular-questions.edit', ['popularQuestion' => $popularQuestion])}}">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('admin.popular-questions.destroy', ['popularQuestion' => $popularQuestion])}}"
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

                    {{ $popularQuestions->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
