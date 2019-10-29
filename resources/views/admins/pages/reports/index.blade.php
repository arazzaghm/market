@extends('admins.layouts.app')

@section('content')
    <div class="row clearfix ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Reports</h2>
                    <h5>Total reports: {{ $totalReports}} </h5>
                    <a href="{{route('admin.report-types.create')}}" class="btn btn-success">Create</a>
                </div>

                <div class="body table-responsive">
                    {{ $reports->links() }}

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>TITLE</th>
                            <th>MODEL</th>
                            <th>MODEL ID</th>
                            <th>CREATED AT</th>
                            <th>SHOW</th>
                            <th>DELETE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $report)
                            <tr class="{{$report->isNotViewed() ? 'text-danger' : ''}}">
                                <td>{{$report->id}}</td>
                                <td>{{$report->title}}</td>
                                <td>{{$report->getFormattedModelType()}}</td>
                                <td>{{$report->model()->id}}</td>
                                <th>{{$report->formatCreatedAtDate()}}</th>
                                <td>
                                    <a class="btn btn-warning"
                                       href="{{route('admin.reports.show', ['report' => $report])}}">
                                        Show
                                    </a>
                                </td>
                                <td>
                                    <form
                                        action="{{route('admin.reports.destroy', ['report' => $report])}}"
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

                    {{ $reports->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
