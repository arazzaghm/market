@extends('admins.layouts.app')

@section('content')
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">TODAY'S USERS</div>
                    <div class="number count-to" data-from="0" data-to="{{$todayUsers}}" data-speed="9"
                         data-fresh-interval="20">{{$todayUsers}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">group</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL USERS</div>
                    <div class="number count-to" data-from="0" data-to="{{$totalUsers}}" data-speed="1000"
                         data-fresh-interval="20">{{$totalUsers}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
