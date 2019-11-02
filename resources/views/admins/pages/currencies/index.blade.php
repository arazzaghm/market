@extends('admins.layouts.app')

@section('content')
    <div class="row clearfix ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Currencies</h2>
                    <h5>Total currencies: {{$totalCurrencies}} </h5>
                    <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal"
                            data-target="#createModal">Create
                    </button>
                </div>

                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>NAME</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($currencies as $currency)
                            <tr>
                                <td>{{ $currency->name }}</td>
                                <td>
                                    <a href="{{route('admin.currencies.edit', ['currency' => $currency])}}"
                                       class="btn btn-warning">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('admin.currencies.destroy', ['currency' => $currency])}}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.currencies.store')}}" method="POST">
                        @include('admins.pages.currencies.partials.form', ['currency' => null])
                        <button class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
