@extends('admins.layouts.app')

@section('content')
    <div class="row clearfix ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Report #{{$report->id}}</h2>

                    <h3>{{$report->title}}</h3>
                </div>

                <div class="body">
                    <p><b>Description:</b> {{$report->description}}</p>
                    <p><b>Reported at:</b> {{$report->formatCreatedAtDate()}}</p>
                    <p><b>Reported object: </b>
                        @if($report->subjectIsPost())
                            Post <br>
                            <a class="btn btn-success"
                               href="{{route('posts.show', ['category' => $model->category, 'post' => $model])}}">Show</a>
                        @else
                            User <br>
                            <a class="btn btn-success" href="{{route('users.show', ['user' => $model])}}">Show</a>
                        @endif
                    </p>
                    <p>
                       <b> Make unread:</b>
                    </p>
                    <form action="{{route('admin.reports.update', $report)}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <button class="btn btn-warning">Make unread</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
