@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="header">
            Create report type
        </div>
        <div class="body">
            <form action="{{route('admin.report-types.store')}}" method="POST">
                @include('admins.pages.reportTypes.partials.form')
                <button class="btn btn-lg btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
