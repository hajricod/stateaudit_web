@extends('layouts.admin')

@section('content')

{{-- <h3>{{__('Dashboard')}}</h3> --}}
<div class="p-3">
    <div class="row">
        <div class="col-md-4 p-2 d-flex">
            <div class="card w-100">
                <h5 class="card-header">{{__('Complaints')}}</h5>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush pr-0">
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-info text-white">
                            <h5 class="m-0">{{__('New Complaints')}}</h5>
                            <span class="badge badge-light badge-pill d-flex align-items-center justify-content-center" style="font-size: 1em">{{$comp_new}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-end">
                            {{__('Complaints Received')}}
                            <span class="badge badge-primary badge-pill">{{$comp_count}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-end">
                            {{__('Archived Complaints')}}
                            <span class="badge badge-primary badge-pill">{{$comp_archived}}</span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="mb-1">{{__('Latest received complaint')}}</p>
                        @switch($days)
                            @case($days == 1 && str_replace('_', '-', app()->getLocale()) == 'ar')
                                <small>اليوم</small>
                                @break
                            @case( $days == 2 && str_replace('_', '-', app()->getLocale()) == 'ar')
                                <small>{{__('Since')}} يومين</small>
                                @break
                            @case($days > 1 && str_replace('_', '-', app()->getLocale()) == 'ar')
                                <small>{{__('Since')}} {{ $days }} {{__('Days')}}</small>
                                @break
                            @default
                                <small>{{__('Since')}} {{ $days }} {{__('Days')}}</small>
                        @endswitch
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-2 d-flex">
            <div class="card w-100">
                <h5 class="card-header">{{__('Users')}}</h5>
                <div class="card-body">
                    <ul class="list-group list-group-flush pr-0">
                        <li class="list-group-item d-flex justify-content-between align-items-end">
                            {{__('Users Registered')}}
                            <span class="badge badge-primary badge-pill">{{$users['count']}}</span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="mb-1">{{__('Latest Registered User')}}</p>
                        <small>{{$users['latest_user']['name']}}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-2 d-flex">
            <div class="card w-100">
                <h5 class="card-header">{{__('News')}}</h5>
                <div class="card-body">
                    <ul class="list-group list-group-flush pr-0">
                        <li class="list-group-item d-flex justify-content-between align-items-end">
                            {{__('News Count')}}
                            <span class="badge badge-primary badge-pill">{{$news['count']}}</span>
                        </li>
                        {{-- <li class="list-group-item d-flex justify-content-between align-items-end">
                            {{__('Users Registered')}}
                            <span class="badge badge-primary badge-pill">{{$users['count']}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-end">
                            {{__('Users Registered')}}
                            <span class="badge badge-primary badge-pill">{{$users['count']}}</span>
                        </li> --}}
                        <li class="list-group-item">
                            <h6 class="w-fit">{{__('Latest Title')}}:</h6>
                            <p>
                                {{ app()->getLocale() == 'ar'? $news['latest_news']['title'] : $news['latest_news']['title_en']}}
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="mb-1">{{__('Latest News')}}</p>
                        <small>{{$news['latest_news']['created_at']}}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection