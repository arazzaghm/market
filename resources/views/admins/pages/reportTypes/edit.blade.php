@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="header">
            Update report type {{$reportType->name}}
        </div>
        <div class="body">
            <form action="{{route('admin.report-types.update', ['reportType' => $reportType])}}" method="POST">
                @method('PATCH')
                @include('admins.pages.reportTypes.partials.form')
                <button class="btn btn-lg btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
