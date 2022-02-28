@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 pb-3 min-h-80">
            <h4>{{__('Organizational Structure')}}</h4>
            <hr>
            @if (lang() == 'ar')
                <div class="bg-white p-3 shadow-sm rounded">
                    <img class="img-fluid" src="{{asset('storage/laws/org_chart_ar.jpg')}}" alt="{{__('Organizational Structure')}}">
                </div>
            @else
                <div class="bg-white p-3 shadow-sm rounded">
                    <img class="img-fluid" src="{{asset('storage/laws/org_chart_en.jpg')}}" alt="{{__('Organizational Structure')}}">
                </div>
            @endif
        </div>
    </div>
</div>

@endsection