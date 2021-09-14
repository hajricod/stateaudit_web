@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/videos" method="POST">
                        @csrf
                        @if ($latestVideo)
                        <div class="form-group">
                            <label for="">{{__('Latest added video')}}</label>
                            <div class="row border rounded mx-1 pt-1">
                                <div class="col">
                                    <label for="title">{{__('Title')}}:</label>
                                    <span class="bold">{{$latestVideo->title}}</span>
                                </div>
                                <div class="col">
                                    <label for="rank">{{__('Rank')}}:</label>
                                    <span class="bold">{{$latestVideo->rank}}</span>
                                </div>
                                <div class="col">
                                    <label for="date">{{__('Date')}}:</label>
                                    <span>{{$latestVideo->created_at->format("M j, Y")}}</span>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($list)
                        <div class="form-group">
                            <label for="list">{{__('List')}}</label>
                            <select class="form-control" name="program_list" id="program_list">
                                <option value="{{$list->id}}" selected> {{$list->title}}</option>
                            </select>
                        </div>
                        @endif
                        
                        <div class="form-group">
                            <label for="rank">{{__('Rank')}}</label>
                            <input class="form-control" type="number" name="rank" id="rank" value="{{$latestVideo ? $latestVideo->rank+1 : 1}}">
                            @if (!$list)
                                <input type="hidden" name="program_id" value="{{$program_id}}">
                            @endif
                            
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
                            <label for="url">{{__('URL')}}</label>
                            <input class="form-control" type="text" name="url" id="url" value="{{old('url') ? old('url') : 'https://www.youtube.com/embed/'}}" dir="ltr">
                            @error('url')
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