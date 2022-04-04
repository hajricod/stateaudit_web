@extends('layouts.app')

@section('content')

<div class="container">
    <h4>{{__('Policies')}}</h4>
    <hr>
    <div class="row">
        <div class="col-md-12 pt-5 pb-3" style="min-height: 80vh">
            @if (lang() == 'ar') 
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <ul class="list-group list-group-flush px-0 shadow-sm">
                            @foreach ($policies as $policy)
                                <a href="{{asset('storage/policies/'.$policy['url'])}}" target="_blank" class="list-group-item list-group-item-action p-3">
                                    {{__($policy['title'])}}
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <ul class="list-group list-group-flush shadow-sm px-0">
                            @foreach ($policies_en as $policy_en)
                                <a href="{{asset('storage/policies/'.$policy_en['url'])}}" target="_blank" class="list-group-item list-group-item-action p-3">
                                    {{__($policy_en['title'])}}
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection