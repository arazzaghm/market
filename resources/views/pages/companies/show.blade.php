@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>{{$company->name}}</h2>
        </div>
        <div class="card-body">
            <p>Phone number: {{$company->getFormattedPhoneNumber()}}</p>
            <p>{{$company->description}}</p>
        </div>
    </div>
@endsection
