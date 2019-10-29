@extends('admins.layouts.app')

@section('content')
    <div class="row clearfix ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Users</h2>
                    <h5>Total users: {{ $totalUsers }} </h5>
                </div>

                <div class="body table-responsive">
                    {{ $users->links() }}

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>EMAIL</th>
                            <th>FULL NAME</th>
                            <th>REGISTERED AT</th>
                            <th>ROLE</th>
                            <th>ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="{{$user->role == \App\Classes\Role::ADMIN ? 'text-danger font-bold' : ($user->role == \App\Classes\Role::MODERATOR ? 'text-success font-bold' : '')}} ">
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->getFormattedFulName() }}</td>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                <td>{{ $user->getRoleNameAsString() }}</td>
                                <td>
                                    <div class="dropdown pl-2">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @can('beBanned', $user)
                                                <li>
                                                    <form action="{{route('admin.users.ban', ['user' => $user])}}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-block btn-link">
                                                            {{$user->isBanned() ? 'Unban' : 'Ban'}}
                                                        </button>
                                                    </form>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
