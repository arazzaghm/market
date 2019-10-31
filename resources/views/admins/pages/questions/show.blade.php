@extends('admins.layouts.app')

@section('content')
    <div class="row clearfix ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>{{$question->title}}</h2>
                </div>
                <div class="body">
                    <p>{{$question->text}}</p>
                    <hr>
                    @can('beAnswered',$question)
                        <form action="{{route('admin.questions.answer', ['question' => $question])}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea rows="4" class="form-control no-resize"
                                          name="text"
                                          placeholder="Please type the answer you want..."></textarea>
                            </div>
                            <button class="btn btn-success">Answer</button>
                        </form>
                    @endcan
                    @if($question->isAnswered())
                        <h3>Answer:</h3>
                        <p>{{$question->answer->text}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
