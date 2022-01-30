@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 pt-5 pb-3">
            <h4 class="text-center">{{$program->title}}</h4>
            <hr>
            <ul class="list-group list-group-flush px-0">
                @foreach ($lists as $list)
                    <a href="/media/videos/{{$program->id}}/{{$list->id}}" class="list-group-item list-group-item-action">{{$list->title}}</a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection