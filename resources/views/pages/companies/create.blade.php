@extends('layouts.app')

@section('content')
    <h2>@lang('sentence.company.create')</h2>
    <p>@lang('sentence.company.createDescription')</p>
    <div class="card">
        <div class="card-header">
            @lang('sentence.company.create')
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
