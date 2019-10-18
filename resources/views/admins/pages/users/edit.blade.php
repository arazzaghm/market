@extends('admins.layouts.app')

@section('content')
    <!-- Vertical Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Edit <b>{{$user->name}}`s</b> profile
                    </h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.users.update', $user)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label for="email">Email Address</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control"
                                       placeholder="Enter your email address">
                            </div>
                        </div>
                        <label for="name">Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="name" name="name" class="form-control"
                                       placeholder="Name" value="{{$user->name}}">
                            </div>
                        </div>
                        @unless(auth()->id() === $user->id)
                            <select name="role" class="form-control">
                                @foreach(\App\Classes\Role::$names as $roleValue => $roleName)
                                    <option value="{{$roleValue}}" {{ $user->role === $roleValue ? 'selected' : '' }}>
                                        {{$roleName}}
                                    </option>
                                @endforeach
                            </select>

                        @else
                            <input type="hidden" name="role" value="{{auth()->user()->role}}">
                        @endunless
                        <br>
                        <input type="hidden" name="userId" hidden value="{{$user->id}}">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Vertical Layout -->
@endsection
