@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="/admin/media/lists" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="program_id" value="{{$id}}">
                        <label for="title">{{__('Title')}}</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{old('title')}}">
                        @error('title')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection