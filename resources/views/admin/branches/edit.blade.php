@extends('layouts.admin')

@section('content')

<div class="d-flex justify-cotent-start align-items-center">
    <x-back-button url='/admin/branches' />
    <x-delete-button url='/admin/branches/{{$branch->id}}' />
    <h3 class="m-0">{{__('Edit')}} {{__('Branch')}}</h3>
</div>
<hr>

<div class="card border-0 rounded shadow-sm">
    <div class="card-body">
        <form action="/admin/branches/{{$branch->id}}" method="post">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group text-right" dir="rtl">
                        <label for="title">العنوان</label>
                        <input class="form-control" type="text" name="title" value="{{old('title')? old('title'): $branch->title}}" required>
                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-left" dir="ltr">
                        <label for="title_en">Title</label>
                        <input class="form-control" type="text" name="title_en" value="{{old('title_en')? old('title_en'): $branch->title_en}}" required>
                        @error('title_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group" >
                        <label for="url">{{__('URL')}}</label>
                        <input class="form-control text-left" dir="ltr" type="text" name="url" value="{{old('url')? old('url'): $branch->url}}" required>
                        @error('url')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row text-left" dir="ltr"> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input class="form-control" type="text" name="longitude" value="{{old('longitude')? old('longitude'): $branch->longitude}}">
                        @error('longitude')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input class="form-control" type="text" name="latitude" value="{{old('latitude')? old('latitude'): $branch->latitude}}">
                        @error('Latitude')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="sort">{{__('Sort')}}</label>
                    <input type="number" name="sort" class="form-control" min="1" value="{{old('sort')? old('sort'): $branch->sort}}">
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <label class="m-0" for="status">{{__('Status')}}</label>
                    <input class="mx-2" type="checkbox" name="status"  {{old('status') == 'off'? '': ($branch->status? 'checked': '')}}>
                </div>
            </div>
            <hr>
            <button class="btn btn-primary btn-block" type="submit">{{__('Save')}}</button>
        </form>
    </div>
</div>

@endsection