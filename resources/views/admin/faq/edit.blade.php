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

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-cotent-start align-items-center">
                    <x-back-button url='/admin/faq' />
                    <h3 class="m-0">{{__('Edit Question')}}</h3>
                </div>
                
                <hr>

                <form action="/admin/faq/{{$faq->id}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="rank">{{__('Rank')}}</label>
                        <input class="form-control" type="number" name="rank" id="rank" value="{{old('rank') ? old('rank') : $faq->rank}}">
                        @error('rank')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="faq_group_id">{{__('Section')}}</label>
                        <select name="faq_group_id" id="faq_group_id" class="form-control">
                            @foreach ($faqgroups as $faqgroup)
                               <option 
                               value="{{$faqgroup->id}}"
                               {{$faq->faq_group_id == $faqgroup->id ? 'selected' : ''}}>
                               {{app()->getLocale() == 'ar' ? $faqgroup->title : $faqgroup->title_en}}
                            </option> 
                            @endforeach
                        </select>
                        @error('faq_group_id')
                            <p class="text-danger">{{__('Section Required')}}</p>
                        @enderror
                    </div>
                    <div class="form-group text-right" dir="rtl">
                        <label for="question">السؤال</label>
                        <textarea class="form-control" name="question" id="question" rows="4">{{old('question') ? old('question') : $faq->question}}</textarea>
                        @error('question')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group text-left" dir="ltr">
                        <label for="question_en">Question</label>
                        <textarea class="form-control" name="question_en" id="question_en" rows="4">{{old('question_en') ? old('question_en') : $faq->question_en}}</textarea>
                        @error('question_en')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="group-control pb-3 text-right" dir="rtl">
                        <label for="answer">الجواب</label>
                        <textarea class="content" name="answer" id="content">{{old('answer') ? old('answer') : $faq->answer}}</textarea>
                        @error('answer')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <hr>
                    <div class="group-control pb-3 text-left" dir="ltr">
                        <label for="content_en">Answer</label>
                        <textarea class="content" name="answer_en" id="content_en">{{old('answer_en') ? old('answer_en') : $faq->answer_en}}</textarea>
                        @error('answer_en')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">{{__('Send')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection