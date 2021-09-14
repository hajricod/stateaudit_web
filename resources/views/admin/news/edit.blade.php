@extends('layouts.admin')

@section('head-script')
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
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{__('Edit News')}}</h2>
            <div class="card">
                <div class="card-content px-3 pt-5 pb-3">
                <form action="/admin/news/{{ $news->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="group-control pb-3">
                                <label for="type">{{__('Type')}}</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="news" {{$news->type == 'news' ? 'selected' : ''}}>{{lang() == 'ar'? 'خبر' : 'News'}}</option>
                                    <option value="statement" {{$news->type == 'statement' ? 'selected' : ''}}>{{__('Statement')}}</option>
                                </select>
                                @error('type')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="group-control pb-3 {{app()->getLocale() == 'en' ? 'text-right' : ''}}" {{app()->getLocale() == 'en' ? 'dir="rtl"' : ''}}>
                                <label for="title">{{app()->getLocale() == 'en' ? 'العنوان' : __('Title')}}</label>
                                <textarea class="form-control {{app()->getLocale() == 'en' ? 'text-right' : ''}}" type="text" name="title" id="title" maxlength="255">{{old('title') ? old('title') : $news->title}}</textarea>
                                @error('title')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="group-control pb-3 text-left" dir="ltr">
                                <label for="title_en">Title</label>
                                <textarea class="form-control" type="text" name="title_en" id="title_en" maxlength="255">{{old('title_en') ? old('title_en') : $news->title_en}}</textarea>
                                @error('title_en')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="group-control pb-3">
                                <label for="created_at">{{__('Date of Publication')}}</label>
                                <input class="form-control" type="datetime-local" name="created_at" id="created_at" value="{{old('created_at') ? old('created_at') : $news->created_at->format('Y-m-d\TH:i')}}">
                                @error('created_at')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="group-control pb-3">
                                <label for="lang">{{__('Language')}}</label>
                                <select name="lang" id="lang" class="form-control">
                                    <option value="ar" {{$news->lang == 'ar' ? 'selected' : ''}}>العربية</option>
                                    <option value="en" {{$news->lang == 'en'? 'selected' : ''}}>En</option>
                                </select>
                                @error('lang')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div> --}}
                        </div>
                        <div class="col-md-6">
                            <label for="title" class="text-md-center d-block">{{__('Image')}}</label>
                            <div class="showImage-holder">
                                <img id="showImage" src="{{ asset("storage/news/$news->image") }}" width="300" height="300" style="visibility: revert;" />
                                <div class="form-group">
                                    <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg" style="display: none">
                                </div>
                                {{-- <button type="button" id="chooseImage" class="btn btn-primary">+</button> --}}
                                <button type="button" id="chooseImage" class="btn btn-primary rounded-circle p-1 overflow-auto">
                                    {{-- <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg> --}}
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </button>
                            </div>
                            @error('image')
                                <p class="text-danger text-md-center"> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="group-control pb-3">
                        <label for="content">المحتوى</label>
                        <textarea class="content" id="content" name="content">{!! old('content') ? old('content') : $news->content !!}</textarea>
                        @error('content')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <hr>
                    <div class="group-control pb-3 text-left">
                        <label for="content_en">Content</label>
                        <textarea class="content_en" id="content_en" name="content_en">{!! old('content_en') ? old('content_en') : $news->content_en !!}</textarea>
                        @error('content_en')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <hr>
                    <div class="group-control pb-3">
                        <button type="submit" class="btn btn-primary btn-block"> {{__('Save')}}</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')

<script>

    $('#chooseImage').on('click', function(){
        $('#image').trigger('click');
    });

    $('#image').on("change", function(e){

        var reader = new FileReader();

        reader.onload = function (e) {
            $('#showImage').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(event.target.files[0]);
        $('#showImage').css('visibility', 'revert');


        var fd = new FormData();
        var files = $('#image')[0].files;
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf_token
            }
        });

        if(files.length > 0 ){
            fd.append('file',files[0]);

            $.ajax({
                url: '/profile/upload',
                type: 'post',
                data: fd,
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        console.log(response);
                    }else{
                        alert('file not uploaded');
                    }
                },
            });
            
        }else{
            alert("Please select a file.");
        }

    });
</script>
@endsection