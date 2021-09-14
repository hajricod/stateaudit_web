@extends('layouts.admin')

@section('content')



<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-cotent-start align-items-center">
                    <x-back-button url='/admin/faqgroup' />
                    <x-delete-button url='/admin/faqgroup/{{$faqgroup->id}}' />
                    <h3 class="m-0">{{__('Edit FAQ Section')}}</h3>
                </div>
                
                <hr>

                <form action="/admin/faqgroup/{{$faqgroup->id}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="rank">{{__('Rank')}}</label>
                        <input class="form-control" type="number" name="rank" id="rank" value="{{old('rank') ? old('rank') : $faqgroup->rank}}">
                        @error('rank')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group text-right" dir="rtl">
                        <label for="title">العنوان</label>
                        <input class="form-control" type="text" name="title" id="title" maxlength="255" value="{{old('title') ? old('title') : $faqgroup->title}}">
                        @error('title')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group text-left" dir="ltr">
                        <label for="title_en">Title</label>
                        <input class="form-control" type="text" name="title_en" id="title_en" maxlength="255" value="{{old('title_en') ? old('title_en') : $faqgroup->title_en}}">
                        @error('title_en')
                            <p class="text-danger">{{$message}}</p>
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