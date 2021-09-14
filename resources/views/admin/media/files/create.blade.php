@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/media_files" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($latestFile)
                        <div class="form-group">
                            <label for="">{{__('Latest added video')}}</label>
                            <div class="row border rounded mx-1 pt-1">
                                <div class="col">
                                    <label for="title">{{__('Title')}}:</label>
                                    <span class="bold">{{$latestFile->title}}</span>
                                </div>
                                <div class="col">
                                    <label for="rank">{{__('Rank')}}:</label>
                                    <span class="bold">{{$latestFile->rank}}</span>
                                </div>
                                <div class="col">
                                    <label for="date">{{__('Date')}}:</label>
                                    <span>{{$latestFile->created_at->format("M j, Y")}}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <div class="form-group">
                            <label for="rank">{{__('Rank')}}</label>
                            <input class="form-control" type="number" name="rank" id="rank" value="{{$latestFile ? $latestFile->rank+1 : 1}}">
                            <input type="hidden" name="program_id" value="{{$program_id}}">
                            
                            @error('rank')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <textarea class="form-control" rows="2" name="title" id="title">{{old('title')}}</textarea>
                            @error('title')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">{{__('Description')}}</label>
                            <textarea class="form-control" rows="4" name="description" id="description">{{old('description')}}</textarea>
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
                        </div>
                        <div class="form-group">
                            <label for="created_at">{{__('Date of Publication')}}</label>
                            <input class="form-control" type="datetime-local" name="created_at" id="created_at" value="{{old('created_at')}}" dir="ltr">
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