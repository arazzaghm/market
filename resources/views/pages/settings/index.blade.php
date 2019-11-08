@extends('layouts.app')

@section('content')
    <div class="row">
        @include('pages.settings.partials.sidebar')
        <div class="col-md-8">
            @include('pages.settings.partials.information_form')
            <div class="card mt-2">
                <div class="card-header">
                    @lang('company.myCompany')
                    <div class="card-body">
                        @if(auth()->user()->hasCompany())
                            <a href="{{route('my-company.index')}}" class="btn btn-primary">@lang('common.show')</a>
                        @else
                            <p>@lang('sentence.company.noCompany')</p>
                            <a href="{{route('companies.create')}}" class="btn btn-success">@lang('common.create')</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
