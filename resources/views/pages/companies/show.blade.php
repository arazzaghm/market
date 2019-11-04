@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>{{$company->name}}</h2>
        </div>
        <div class="card-body">
            <img src="{{$company->getFirstMediaUrl('logo')}}" alt="{{$company->name}}">
            <p>Phone number: {{$company->getFormattedPhoneNumber()}}</p>
            <p>{{$company->description}}</p>
            <p>Owner: <a href="{{route('users.show', ['user' => $company->user])}}"> {{$company->user->name}}</a></p>
        </div>
    </div>
@endsection
