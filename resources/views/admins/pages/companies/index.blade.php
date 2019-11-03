@extends('admins.layouts.app')

@section('content')
    <div class="row clearfix ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Companies</h2>
                    <h5>Total companies: {{ $totalCompanies }} </h5>
                </div>

                <div class="body table-responsive">

                    {{ $companies->links() }}

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE NUMBER</th>
                            <th>WEBSITE</th>
                            <th>REGISTERED AT</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sellers as $seller)
                            <tr>
                                <th scope="row">{{ $seller->id }}</th>
                                <td>{{ $seller->email }}</td>
                                <td>{{ $seller->getFormattedFulName() }}</td>
                                <td>{{ $seller->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <form action="{{route('admin.sellers.update', ['user' => $seller])}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-danger">Fire</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $sellers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
