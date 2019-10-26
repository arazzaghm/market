@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                @include('auth.partials.register_form')
            </div>
        </div>
    </div>
</div>
@endsection
