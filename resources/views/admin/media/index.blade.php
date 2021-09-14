@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-lg-6 col-md-4 col-sm-12 p-0">
                <div class="card m-1">
                    <div class="card-body">
                        <h5 class="card-title">
                            @if ($category->url != "#")
                                <a href="/admin/{{$category->url}}">{{$category->title}}</a>
                            @else
                                <a href="{{route('media-sections', $category->id)}}">{{$category->title}}</a>
                            @endif
                        </h5> 
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
