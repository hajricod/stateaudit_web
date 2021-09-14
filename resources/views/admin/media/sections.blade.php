@extends('layouts.admin')

@section('content')

<div class="container">
    <h2>{{$title}}</h2>
    <hr>
    <div class="row">
        @foreach ($programs as $program)
            <div class="col-lg-6 col-md-4 col-sm-12 p-0">
                <div class="card m-1">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/admin{{str_replace('years', 'videos', $program->url)}}/{{$program->id}}">{{$program->title}}</a>
                        </h5> 
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
