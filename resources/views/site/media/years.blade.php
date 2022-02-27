@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 pb-3">
            <h4 class="text-center">{{$program->title}}</h4>
            <hr>
            <ul class="list-group list-group-flush px-0">
                @foreach ($years as $year)
                    <a href="{{route('videosByYear', [$program->id,  $year])}}" class="list-group-item list-group-item-action">{{$year}}</a>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection