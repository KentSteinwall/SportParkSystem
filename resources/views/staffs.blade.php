<!-- staff profile -->
@extends('layouts.app')

@section('content')

<!-- check if any staff member is loggedin -->
@if(isset(Auth::user()->username))
    <div class="alert alert-success success-block">
        <strong>Welcome {{Auth::user()->username}}</strong>
        <br/>
        <a href="{{url('StaffLogin/logout')}}">Logout</a>
    </div>
@else
    <!-- if anyone not loggedin redirect to stff login page -->
    <script>window.location="/StaffLogin";</script>
@endif

<!-- view the staff meber profile with all the details -->
@if(isset(Auth::user()->username))

    @section('sidebar')
    @if(count($staffs)>0)
        @foreach($staffs as $staff)
            @if($staff->username==Auth::user()->username)
            <div class="alert alert-info"><h3>
            <a href="/staffs"><span class="glyphicon glyphicon-user"></span> My Profile</h3></a>
            <hr>
            <h4>Bio details : </h4><br/>
                <ul class="list-group">
                    <li class="list-group-item">Position : <b>{{$staff->position}}</b></li>
                    <li class="list-group-item">FirstName : <b>{{$staff->firstname}}</b></li>
                    <li class="list-group-item">LastName : <b>{{$staff->lastname}}</b></li>
                    <li class="list-group-item">NIC : <b>{{$staff->nic}}</b></li>
                    <li class="list-group-item">Email : <b>{{$staff->email}}</b></li>
                    <li class="list-group-item">Address : <b>{{$staff->address}}</b></li>
                    <li class="list-group-item">MobileNo : <b>{{$staff->mobile}}  </b></li>
                    <li class="list-group-item">
                    <a href="/staffupdate"><b>Edit <span class="glyphicon glyphicon-edit"></span></b></a></li>
                    <hr>
                    <a href="/staffpasschange"><b>Change Password <span class="glyphicon glyphicon-lock"></span></b></a></li>
                   
                </ul></div>
            @endif
        @endforeach

    @endif

    @endsection
@else
<script>window.location="/StaffLogin";</script>
@endif

<a href="/messageinbox"><button class="btn btn-success">Messages</button></a>
<a href="/viewcustomer"><button class="btn btn-warning">Customers</button></a>

@endsection