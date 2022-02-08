@extends('layouts.admin')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">{{__('Add')}} {{__('Event')}}</h5>
                    <hr>
                    <form action="/admin/media_events" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="group-control pb-3 text-right" dir="rtl">
                                    <label for="title">العنوان</label>
                                    <textarea class="form-control" type="text" name="title" id="title" maxlength="255">{{old('title')}}</textarea>
                                    @error('title')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="group-control pb-3 text-left" dir="ltr">
                                    <label for="title">Title</label>
                                    <textarea class="form-control" type="text" name="title_en" id="title_en" maxlength="255">{{old('title_en')}}</textarea>
                                    @error('title_en')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="group-control pb-3">
                                            <label for="from">{{__('From')}}</label>
                                            <input class="form-control" type="date" name="start_on" id="start_on" value="{{old('start_on')}}">
                                            @error('start_on')
                                                <p class="text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group-control pb-3">
                                            <label for="to">{{__('To')}}</label>
                                            <input class="form-control" type="date" name="end_on" id="end_on" value="{{old('end_on')}}">
                                            @error('end_on')
                                                <p class="text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>                                        
                                    </div>
                                </div>
                                <hr>
                                <div class="group-control pb-3">
                                    <div class="row">
                                        <div class="col-12 col-md-4 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-block"> {{__('Save')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection