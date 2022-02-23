@extends('layouts.app')

@section('head-script')

<script async src="https://cse.google.com/cse.js?cx=1628d84f0ae965cf6"></script>    

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="py-md-5"></div>
            <h2>{{__('Search')}}</h2>
            <hr>

            <div class="gcse-search"></div>
        </div>
    </div>
</div>

@endsection