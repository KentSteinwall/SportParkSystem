@extends('layouts.app')

@section('content')

<img src="img/a.jpg">
@section('sidebar')
@parent
@endsection

<!-- //signup for customers -->
<!-- add login details in first step -->

<div class="col-sm-8">
{!! Form::open(['url'=>'signup/store']) !!}
<h3>SignUp</h3>
<hr>
<div class="form-group">
    {{Form::label('username','Username')}}
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {{Form::text('username','',['class'=>'form-control','placeholder'=>'Enter Username','required'])}}
</div></div>

<div class="form-group">
    {{Form::label('email','Email')}}
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
    {{Form::text('email','',['class'=>'form-control','placeholder'=>'someone@gmail.com','required'])}}
</div></div>
<div class="form-group">
    {{Form::label('password','Password')}}
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
    {{Form::password('password',['class'=>'form-control','placeholder'=>'Enter Password','required'])}}
</div></div>
<div class="form-group">
    {{Form::label('password_confirmation','ReEnter')}}
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
    {{Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Re-enter Password','required'])}}
</div></div>
<div>
    {{Form::submit('Submit & Next',['class'=>'btn btn-primary'])}}
</div>

{!! Form::close() !!}

</div>

@endsection