@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 pt-5 pb-3">
            <h4>{{__('Settings')}}</h4>
            <hr>
            <p class="text-center">{{__('Website Parts')}}</p>
            <div class="row">
                
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{__('Header Section')}}</h5>
                            <hr>
                            <a class="btn btn-primary btn-block" href="{{url('admin/header')}}">{{__('Modify')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{__('Footer Section')}}</h5>
                            <hr>
                            <a class="btn btn-primary btn-block" href="{{url('admin/footer')}}">{{__('Modify')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{__('Branches')}}</h5>
                            <hr>
                            <a class="btn btn-primary btn-block" href="{{url('admin/branches')}}">{{__('Modify')}}</a>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
            <p class="text-center">{{__('Logs')}}</p>
            <div class="row">
                <div class="col-md-3 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{__('Complaints')}}</h5>
                            <hr>
                            <a class="btn btn-primary btn-block" href="{{route('complaint.logs')}}">{{__('Enter')}}</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection