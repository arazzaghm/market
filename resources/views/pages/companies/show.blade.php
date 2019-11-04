@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>{{$company->name}}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <img src="{{$company->getFirstMediaUrl('logo')}}" alt="{{$company->name}}">
                </div>
                <div class="col">
                    <p>Email: @auth {{$company->email}} @else Log in or register to view the credentials @endauth</p>
                    <p>Phone number: @auth {{$company->getFormattedPhoneNumber()}} @else Log in or register to view the
                        credentials @endauth</p>
                    <p>{{$company->description}}</p>
                    <p>
                        Owner:
                        <a href="{{route('users.show', ['user' => $company->user])}}">
                            {{$company->user->name}}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
