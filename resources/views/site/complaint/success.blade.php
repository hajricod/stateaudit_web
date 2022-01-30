@extends('layouts.blank')

@section('style')

<style>
    * {
        padding: 0;
        margin: 0
    }

    .wrapper {
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .checkmark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        stroke: #7ac142;
        fill: none;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
    }

    .checkmark {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #fff;
        stroke-miterlimit: 10;
        margin: 5% auto;
        box-shadow: inset 0px 0px 0px #7ac142;
        animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        animation-delay: 1.5s;
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none
        }

        50% {
            transform: scale3d(1.1, 1.1, 1)
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 30px #7ac142
        }
    }
</style>

@endsection

@section('content')

{{-- @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif --}}

<div class="container d-flex justify-content-center align-items-center" style="height: 90vh">
    <div class="card border-0 rounded shadow-sm w-75">
        <div class="card-body text-center">
            <div class="wrapper"> 
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                </svg>
            </div>
            <h1>{{__('Complaint was sent successfully!')}}</h1>
            <h4>{{__('Complaint Number is')}}: <span class="text-info" dir="ltr">#{{$id}}</span></h4>
            <hr>
            <a href="/">{{__('Back to Home Page')}}</a>
        </div>
    </div>
</div>

@endsection