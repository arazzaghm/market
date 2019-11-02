@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="header">
            Edit currency <b>{{$currency->name}}</b>
        </div>
        <div class="body">
            <form action="{{route('admin.currencies.update', ['currency' => $currency])}}" method="POST">
                @method('PATCH')
                @include('admins.pages.currencies.partials.form', ['currency' => $currency])
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
