@extends('layouts.app')

@section('content')
    <div class="row">
        @include('pages.settings.partials.sidebar')
        <div class="col-md-8">@include('pages.settings.partials.information_form')</div>
    </div>
@endsection
