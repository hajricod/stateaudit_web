@extends('layouts.app')

@section('content')

<div class="container">
    <h4>{{__('FAQ')}}</h4>
    <hr>
    <div class="row">
        <div class="col">
            {{-- <ul class="list-group list-group-flush p-0">
                @foreach ($faqgroups as $faqgroup)
                    <li class="list-group-item p-0 border-0">
                        <h5 class="m-0 p-3 border-bottom">{{app()->getLocale() == 'ar' ? $faqgroup->title : $faqgroup->title_en}}</h5>
                        <div class="accordion" id="accordionFAQ_{{$faqgroup->id}}">
                            @foreach ($faqs as $faq)
                                @if ($faq->faq_group_id == $faqgroup->id)
                                    <div class="card border-0 rounded-0" style="border-bottom: 1px solid #ccc!important">
                                        <div class="card-header d-flex justify-content-between align-items-center px-1" id="heading_{{$faq->id}}">
                                            <button class="btn {{app()->getLocale() == 'ar' ? 'text-right' : 'text-left'}} shadow-none text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$faq->id}}" aria-expanded="true" aria-controls="collapse_{{$faq->id}}">
                                                {{app()->getLocale() == 'ar' ? $faq->question : $faq->question_en}}
                                            </button>
                                        </div>
                                
                                        <div id="collapse_{{$faq->id}}" class="collapse" aria-labelledby="heading_{{$faq->id}}" data-parent="#accordionFAQ_{{$faqgroup->id}}">
                                            <div class="card-body {{app()->getLocale() == 'ar' ? 'text-right' : 'text-left'}}">
                                                {!! app()->getLocale() == 'ar' ? $faq->answer : $faq->answer_en !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul> --}}
            <div class="accordion accordion-flush rounded shadow-sm" id="accordionFAQ" dir="{{lang() == 'ar'? 'rtl' : 'ltr'}}">
                @foreach ($faqgroups as $faqgroup)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqgroup_{{$faqgroup->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5 class="m-0">{{lang() == 'ar' ? $faqgroup->title : $faqgroup->title_en}}</h5>
                            </button>
                        </h2>
                        <div id="faqgroup_{{$faqgroup->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body p-0">
                                @foreach ($faqs as $faq)
                                    @if ($faq->faq_group_id == $faqgroup->id)
                                        <div class="card border-0 rounded-0" style="border-bottom: 1px solid #ccc!important">
                                            <div class="card-header d-flex justify-content-between align-items-center px-3" id="heading_{{$faq->id}}">
                                                <button class="btn {{app()->getLocale() == 'ar' ? 'text-right' : 'text-left'}} shadow-none text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$faq->id}}" aria-expanded="true" aria-controls="collapse_{{$faq->id}}">
                                                    {{app()->getLocale() == 'ar' ? $faq->question : $faq->question_en}}
                                                </button>
                                            </div>
                                    
                                            <div id="collapse_{{$faq->id}}" class="collapse" aria-labelledby="heading_{{$faq->id}}" data-parent="#accordionFAQ_{{$faqgroup->id}}">
                                                <div class="card-body {{app()->getLocale() == 'ar' ? 'text-right' : 'text-left'}}">
                                                    {!! app()->getLocale() == 'ar' ? $faq->answer : $faq->answer_en !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>  
        </div>
    </div>
</div>

@endsection