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
                </div>
            </div>
        </div>
    </div>
    @include('pages.questions.partials.modal')
@endsection
