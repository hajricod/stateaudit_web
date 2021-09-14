@extends('layouts.admin')

@section('content')
<h2>{{__('Feedback')}}</h2>
<br>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="name"><b>{{__('Name')}}:</b></label>
                <P>{{$feedback->name}}</P>
            </div>
            <div class="col-md-6">
                <label for="phone"><b>{{__('Phone')}}:</b></label>
                <P>{{$feedback->phone}}</P>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <label for="email"><b>{{__('Email')}}:</b></label>
                <P>{{$feedback->email}}</P>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <label for="message"><b>{{__('Message')}}:</b></label><br>
                <P>{{$feedback->message}}</P>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <label for="attachments"><b>{{__('Date')}}:</b></label>
                <p>{{$feedback->created_at->format("M j, Y, g:i A")}}</p>
            </div>
        </div>
    </div>
</div>
@endsection