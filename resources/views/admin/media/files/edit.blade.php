@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/media_files/{{$mediaFile->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        
                        <div class="form-group">
                            <label for="rank">{{__('Rank')}}</label>
                            <input class="form-control" type="number" name="rank" id="rank" value="{{old('rank') ? old('rank') : $mediaFile->rank}}">
                            
                            @error('rank')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <textarea class="form-control" rows="2" name="title" id="title">{{old('title') ? old('title') : $mediaFile->title}}</textarea>
                            @error('title')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">{{__('Description')}}</label>
                            <textarea class="form-control" rows="4" name="description" id="description">{{old('description') ? old('description') : $mediaFile->description}}</textarea>
                            @error('description')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="url">{{__('File')}}</label>
                            <input class="btn btn-light text-dark d-block" type="file" name="file" id="file">
                            @error('file')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                            <hr>
                            <label for="current_file">{{__('Current File')}}: </label>
                            <a href="{{asset("storage/files/$mediaFile->file")}}" class="d-block text-right" dir="rtl">{{$mediaFile->file}}</a>
                        </div>
                        <div class="form-group">
                            <label for="created_at">{{__('Date of Publication')}}</label>
                            <input class="form-control" type="datetime-local" name="created_at" id="created_at" value="{{old('created_at') ? old('created_at') : $mediaFile->created_at->format('Y-m-d\TH:i')}}" dir="ltr">
                            @error('created_at')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection