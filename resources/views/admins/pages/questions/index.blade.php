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
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h4>Opened questions</h4>
                        </div>
                        <div class="body table-responsive">
                            @include('admins.pages.questions.partials.table', [
                            'questions' => $openedQuestions,
                            'type' => 'opened',
                            ])
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h4>Closed questions</h4>
                        </div>
                        <div class="body table-responsive">
                            @include('admins.pages.questions.partials.table', [
                            'questions' => $closedQuestions,
                            'type' => 'closed',
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
