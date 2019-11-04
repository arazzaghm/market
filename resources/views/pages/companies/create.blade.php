@extends('layouts.app')

@section('content')
    <h2>Create own company.</h2>
    <p>You can create your own company and place offers on our site. You just need to fill the form and wait for approval!</p>
    <div class="card">
        <div class="card-header">
            New company form
        </div>
        <div class="card-body">
            <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
                @include('pages.companies.partials.form')
                <div class="d-flex justify-content-center mt-2">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
