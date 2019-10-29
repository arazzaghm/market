@extends('admins.layouts.app')

@section('content')
    <div class="row clearfix ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Questions</h2>
                    <h5>Total questions: {{$totalQuestions}} </h5>
                    <h5>Total opened questions: {{$totalOpenedQuestions}} </h5>
                    <h5>Total closed questions: {{$totalClosedQuestions}}</h5>
                </div>

                <div class="body table-responsive">
                    {{ $questions->links() }}
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>TITLE</th>
                            <th>SHOW</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{$question->id}}</td>
                                <td>{{$question->title}}</td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="{{route('admin.questions.show', ['question' => $question])}}">
                                        Show
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $questions->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
