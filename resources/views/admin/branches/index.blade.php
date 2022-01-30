@extends('layouts.admin')

@section('content')

<div class="d-flex justify-cotent-start align-items-center">
    <x-add-button url='/admin/branches/create' title="{{__('Add Branch')}}" />
    <h3 class="m-0">{{__('Branches')}}</h3>
</div>

<hr>

<div class="row">
    <ul class="list-group col-md-8 offset-md-2">
        @foreach ($branches as $branch)
            <a href="/admin/branches/{{$branch->id}}/edit" class="list-group-item d-flex justify-content-between align-items-center">
                {{lang() == 'ar'? $branch->title:$branch->title_en}}
                <span class="badge {{$branch->status? 'bg-success': 'bg-danger'}} rounded-circle p-1 text-light"> </span>
            </a>
        @endforeach
    </ul>
</div>

@endsection