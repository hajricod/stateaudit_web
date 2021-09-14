@extends('layouts.admin')

@section('content')
<h2>{{__('Library')}}</h2>
<hr>

<div class="card py-3 px-5">
    <form action="/admin/folders/{{$folder->id}}?id={{$folder_id}}&sub_id={{$sub_folder_id}}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="col">
                <label for="created_at">{{__('Created')}}:</label>
                <p>{{$folder->created_at}}</p>
            </div>
            <div class="col">
                <label for="updated_at">{{__('Updated')}}:</label>
                <p>{{$folder->created_at}}</p>
            </div>
        </div>
        <div class="form-group ar">
            <label for="title">العنوان</label>
            <input type="text" name="title" id="title" class="form-control" value="{{old('title') ? old('title') : $folder->title }}">
            @error('title')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="form-group en">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{old('title_en') ? old('title_en') : $folder->title }}">
            @error('title')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">{{__('Description')}}</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{old('description') ? old('description') :$folder->description}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">{{__('Save')}}</button>
        </div>
    </form>
</div>
@endsection