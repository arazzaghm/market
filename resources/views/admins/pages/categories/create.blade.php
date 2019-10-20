@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="header">
            Create category
        </div>
        <div class="body">
            <form action="{{route('admin.categories.store')}}" method="POST">
                @include('admins.pages.categories.partials.form')
                <button class="btn btn-lg btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
