@extends('layouts.app')

@section('content')
    <h2>My settings</h2>
    <div class="row">
        <div class="col-4">
            @include('pages.settings.partials.sidebar')
        </div>
        <div class="col-8">@include('pages.settings.partials.information_form')</div>
    </div>
@endsection
