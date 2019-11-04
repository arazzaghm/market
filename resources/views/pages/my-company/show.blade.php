@extends('layouts.app')

@section('content')
    <div class="row">
        @include('pages.my-company.partials.sidebar')
        <div class="col-md-8">
            <h1>Hello!</h1>
            <h3>This is the main page of your company control panel!</h3>
        </div>
    </div>
@endsection
