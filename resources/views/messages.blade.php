<!-- include main layout -->

@extends('layouts.app')

@if(isset(Auth::user()->username))
@section('content')
<h1>Messages</h1>

<!-- show all the messages from forum -->

@if(count($messages)>0)
    @foreach($messages as $message)
        <ul class="list-group">
            <li class="list-group-item">Name : {{$message->name}}</li>
            <li class="list-group-item">Email : {{$message->email}}</li>
            <li class="list-group-item">Message : {{$message->message}}</li>
            <div class="well">
            <form>
            <input type="textarea" class="form-control" name='reply' 
            placeholder="Ente reply message">
            <a href=""><button class="btn btn-primary">Reply</button></a>
            </div>
        </ul>
    @endforeach

@endif

@endsection

@section('sidebar')
@parent
<p>This is a pharagraph.</p>
@endsection

@else
    <script>window.location="/AdminLogin";</script>
@endif