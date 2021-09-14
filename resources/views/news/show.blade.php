@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 bg-white pt-2 pb-3 min-h-80">
            <article class="overflow-auto bg-white p-2">
                <h3 class="d-none d-sm-block pt-2" style="line-height: inherit;">
                    {{app()->getLocale() == 'ar' ? $news->title : $news->title_en}}
                </h3>
                <h5 class="d-block d-sm-none pt-2" style="line-height: inherit;">
                    {{app()->getLocale() == 'ar' ? $news->title : $news->title_en}}
                </h5>
                
                <hr>

                <p class="mb-3"> <b>{{__('Date of Publication')}}:</b> {{$news->created_at->format("M j, Y, g:i A")}}</p>

                <img src="{{asset("storage/news/$news->image")}}" class="img-responsive {{app()->getLocale() == 'ar' ? 'float-left' : 'float-right'}} d-none d-sm-block p-2" alt="{{$news->title}}" width="60%">
                <img src="{{asset("storage/news/$news->image")}}" class="img-responsive d-block d-sm-none p-2" alt="{{$news->title}}" width="100%">
                {!!app()->getLocale() == 'ar' ? $news->content : $news->content_en!!}
            </article>
        </div>
    </div>
</div>
@endsection