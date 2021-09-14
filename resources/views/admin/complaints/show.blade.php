@extends('layouts.admin')

@section('content')
<h2>{{__('Complaint Details')}}</h2>
<br>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="name"><b>{{__('Name')}}:</b></label>
                <P>{{$complaint->name}}</P>
            </div>
            <div class="col-md-6">
                <label for="id_number"><b>{{__('Id number')}}:</b></label>
                <P>{{$complaint->id_number}}</P>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label for="phone"><b>{{__('Phone')}}:</b></label>
                <P>{{$complaint->phone}}</P>
            </div>
            <div class="col-md-6">
                <label for="email"><b>{{__('Email')}}:</b></label>
                <P>{{$complaint->email}}</P>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <label for="type"><b>{{__('Complaint Type')}}:</b></label><br>
                <P>{{$complaint->type}}</P>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <label for="details"><b>{{__('Details')}}:</b></label><br>
                <P>{{$complaint->details}}</P>
            </div>
        </div>
        <hr>
        <div class="row">

            <div class="col-md-12">
                <label for="attachments"><b>{{__('Attachments')}}:</b></label><br>
                {{-- @if (count($attachments) > 0) --}}
                    <ol>
                        @foreach ($attachments as $attachment)
                            @if ($attachment != "")
                               <li><a href='{{ route("download", ["complaints", $attachment]) }}'>{{ __('Attachment')}}</a></li> 
                            @endif
                        @endforeach
                    </ol>
                {{-- @else
                    <p>{{__('Nothing')}}</p>
                @endif --}}
                
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <label for="attachments"><b>{{__('Date')}}:</b></label>
                <p>{{$complaint->created_at->format("M j, Y, g:i A")}}</p>
            </div>
        </div>
    </div>
</div>
@endsection