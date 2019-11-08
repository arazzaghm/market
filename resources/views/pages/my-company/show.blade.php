@extends('layouts.app')

@section('content')
    <div class="row">
        @include('pages.my-company.partials.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2><b>{{$company->name}}</b></h2>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="{{$company->getLogoUrl()}}" alt="{{$company->name}}">
                    </div>
                    <div>
                        <div class="row">
                            <div class="col">
                                <p><i class="fa fa-inbox"></i> {{$company->email}} </p>
                                <p><i class="fa fa-phone"></i> {{$company->getFormattedPhoneNumber()}} </p>
                                <p>{{$company->description}}</p>
                            </div>
                            <div class="col">
                                @can('deleteLogo', $company)
                                    <form action="{{route('my-company.logo.destroy')}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i
                                                class="fa fa-trash"></i> @lang('company.logo.delete')</button>
                                    </form>
                                @endcan
                                @error('logo')
                                    <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                                <button class="btn btn-primary" data-toggle="modal" data-target="#editModal">
                                    <i class="fa fa-edit"></i> @lang('common.edit')
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('my-company.update')}}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @include('pages.companies.partials.form')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
