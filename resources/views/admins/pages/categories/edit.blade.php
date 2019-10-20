@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="header">
            Edit category <b>{{$category->name}}</b>
        </div>
        <div class="body">
            <form action="{{route('admin.categories.update', ['category' => $category])}}" method="POST">
                @method('PATCH')
                @include('admins.pages.categories.partials.form')
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
