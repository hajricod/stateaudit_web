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
            <h2>{{__('Add News')}}</h2>
            <div class="card">
                <div class="card-content px-3 pt-5 pb-3">
                <form action="/admin/news" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="group-control pb-3">
                                <label for="type">{{__('Type')}}</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="news" {{old('type') == 'news' ? 'selected' : ''}}>{{lang() == 'ar'? 'خبر' : 'News'}}</option>
                                    <option value="statement" {{old('type') == 'statement' ? 'selected' : ''}}>{{__('Statement')}}</option>
                                </select>
                                @error('type')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="group-control pb-3">
                                <label for="created_at">{{__('Date of Publication')}}</label>
                                <input class="form-control" type="datetime-local" name="created_at" id="created_at" value="{{old('created_at')}}">
                                @error('created_at')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="group-control pb-3 text-right" dir="rtl">
                                <label for="title">العنوان</label>
                                <textarea class="form-control" type="text" name="title" id="title" maxlength="255">{{old('title')}}</textarea>
                                @error('title')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="group-control pb-3 text-left" dir="ltr">
                                <label for="title_en">Title</label>
                                <textarea class="form-control" type="text" name="title_en" id="title_en" maxlength="255">{{old('title_en')}}</textarea>
                                @error('title_en')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <label for="title" class="text-md-center d-block">{{__('Image')}}</label>
                            <div class="showImage-holder">
                                <img id="showImage" src="" width="300" height="300" style="visibility: hidden;" />
                                <div class="form-group">
                                    <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg" style="display: none">
                                </div>
                                {{-- <button type="button" id="chooseImage" class="btn btn-primary">+</button> --}}
                                <button type="button" id="chooseImage" class="btn btn-primary rounded-circle p-1">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </button>
                            </div>
                            @error('image')
                                <p class="text-danger text-md-center"> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="group-control pb-3 text-right" dir="rtl">
                        <label for="content">المحتوى</label>
                        <textarea class="content" name="content" id="content">{{old('content')}}</textarea>
                        @error('content')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <hr>
                    <div class="group-control pb-3 text-left" dir="ltr">
                        <label for="content_en">Content English</label>
                        <textarea class="content" name="content_en" id="content_en">{{old('content_en')}}</textarea>
                        @error('content_en')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <hr>
                    <div class="group-control pb-3">
                        <button type="submit" class="btn btn-primary btn-block"> {{__('Publish')}}</button>
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


        // var fd = new FormData();
        // var files = $('#image')[0].files;
        // var csrf_token = $('meta[name="csrf-token"]').attr('content');

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': csrf_token
        //     }
        // });

        // if(files.length > 0 ){
        //     fd.append('file',files[0]);

        //     $.ajax({
        //         url: '/profile/upload',
        //         type: 'post',
        //         data: fd,
        //         enctype: 'multipart/form-data',
        //         contentType: false,
        //         processData: false,
        //         success: function(response){
        //             if(response != 0){
        //                 console.log(response);
        //             }else{
        //                 alert('file not uploaded');
        //             }
        //         },
        //     });
            
        // }else{
        //     alert("Please select a file.");
        // }

    });
</script>
@endsection