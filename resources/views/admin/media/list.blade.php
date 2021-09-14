@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="d-flex justify-cotent-start align-items-center">
        <x-add-button url='/admin/media/lists/create?id={{$program->id}}' />
        <h2>{{$program->title}}</h2>
    </div>
    
    <hr>
    <div class="row">
        @foreach ($list as $item)
            <div class="col-lg-6 col-md-4 col-sm-12 p-0">
                <div class="card m-1">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/admin/media/videos/{{$program->id}}/{{$item->id}}">{{$item->title}}</a>
                        </h5> 
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
