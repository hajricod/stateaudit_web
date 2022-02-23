@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 pt-5 pb-3">
            <h4>{{__('Employees Section')}}</h4>
            <hr>
            {{-- <p class="border-bottom w-25">{{__('Services')}}</p> --}}
            <div class="row pt-3">
                
                @foreach ($sections as $section)
                    <div class="col-md-6 pb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <a class="btn btn-link btn-block" target="{{$section['target']}}" href="{{$section['url']}}">{{$section['title']}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection