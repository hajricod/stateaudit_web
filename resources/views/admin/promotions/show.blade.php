@extends('layouts.admin')

{{-- @section('head-script')

<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script>
    tinymce.init({
        selector:'#content',
        height: 400,
        plugins: 'advlist link lists',
        menubar: 'edit view insert format',
        directionality: 'rtl',
        language: 'ar'
    });

    tinymce.init({
        selector:'#content_en',
        height: 400,
        plugins: 'advlist link lists',
        menubar: 'edit view insert format',
        language: 'en'
    });
</script>

@endsection --}}

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">{{__('Promotion')}}</h5>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="group-control pb-3 text-right" dir="rtl">
                                <label for="title">العنوان</label>
                                <textarea class="form-control" type="text" name="title" id="title" maxlength="255" readonly>{{$promotion->title}}</textarea>
                            </div>
                            <div class="group-control pb-3 text-right" dir="rtl">
                                <label for="title">{{__('Description')}}</label>
                                <textarea class="form-control" type="text" name="description" id="description" maxlength="1000" rows="10" readonly>{{$promotion->description}}</textarea>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="group-control pb-3">
                                        <label for="from">{{__('From')}}</label>
                                        <input class="form-control" type="datetime-local" name="start_on" id="start_on" value="{{$promotion->start_on->format('Y-m-d\TH:i')}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group-control pb-3">
                                        <label for="to">{{__('To')}}</label>
                                        <input class="form-control" type="datetime-local" name="end_on" id="end_on" value="{{$promotion->end_on->format('Y-m-d\TH:i')}}" readonly>
                                    </div>                                        
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="attachment" class="d-block">{{__('Attachment')}}</label>
                                <a class="d-block btn btn-light text-dark" href='{{ route("download", ["promotions", $promotion->attachment]) }}'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                    </svg>
                                    {{__('File')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection