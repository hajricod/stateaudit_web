@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 pb-3">
            <h4>{{__('E-Transformation')}}</h4>
            <hr>
            <article class="bg-white p-3 shadow-sm rounded">
                @if (lang() == 'ar')
                    الصفحة غير متوفرة في الوقت الحالي
                @else
                    This page is not available yet.
                @endif
            </article>
        </div>
    </div>
</div>

@endsection