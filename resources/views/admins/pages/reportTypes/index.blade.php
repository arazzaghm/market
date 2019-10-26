@extends('admins.layouts.app')

@section('content')
    <div class="row clearfix ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Report types</h2>
                    <h5>Total Report types: {{ App\Models\ReportType::count()}} </h5>
                    <a href="{{route('admin.report-types.create')}}" class="btn btn-success">Create</a>
                </div>

                <div class="body table-responsive">
                    {{ $reportTypes->links() }}

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>MODEL</th>
                            <th>EDIT</th>
                            <td>DELETE</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reportTypes as $reportType)
                            <tr>
                                <td>{{$reportType->id}}</td>
                                <td>{{$reportType->name}}</td>
                                <td>{{$reportType->model_type}}</td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="{{route('admin.report-types.edit', ['reportType' => $reportType])}}">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('admin.report-types.destroy', ['reportType' => $reportType])}}"
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

                    {{ $reportTypes->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
