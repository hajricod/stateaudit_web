@extends('layouts.admin')

@section('content')
<h2>{{__('File')}}</h2>
<hr>

<div class="card py-3 px-5">
    {{-- <form action="/admin/files/{{$file->id}}?id={{$folder_id}}&{{$sub_folder_id}}" method="POST" enctype="multipart/form-data"> --}}
    <form action="/admin/files/{{$file->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col">
                <label for="created_at">{{__('Created')}}:</label>
                <p>{{$file->created_at}}</p>
            </div>
            <div class="col">
                <label for="updated_at">{{__('Updated')}}:</label>
                <p>{{$file->created_at}}</p>
            </div>
        </div>
        <div class="form-group">
            <label for="title">{{__('Title')}}</label>
            <input type="text" name="title" id="title" class="form-control" value="{{old('title') ? old('title') : $file->title }}">
            @error('title')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">{{__('Description')}}</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{old('description') ? old('description') :$file->description}}</textarea>
        </div>
        <hr>
        <div class="form-group">
            <label for="attachment">{{__('Current File')}}:</label>
            <p class="px-2 text-primary">{{$file->file_name}}</p>

            <label for="attachment">{{__('To Change a File')}}:</label>
            <input type="hidden" name="current_file" id="current_file" value="{{$file->file_name}}">
            <input type="file" name="attachment" id="attachment" class="btn btn-link">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">{{__('Save')}}</button>
        </div>
    </form>
</div>
@endsection