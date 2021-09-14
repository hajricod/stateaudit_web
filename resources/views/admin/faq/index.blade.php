@extends('layouts.admin')

@section('content')

<div class="d-flex justify-cotent-start align-items-center">
    <x-show-button url='/admin/faqgroup' title="{{__('Sections')}}" />
    <x-add-button url='/admin/faq/create' title="{{__('Add Question')}}" />
    <h3 class="m-0">{{__('FAQ')}}</h3>
</div>

<hr>

{{-- <ul class="list-group p-0">
    @foreach ($faqgroups as $faqgroup)
        <a href="{{url('/admin/faqgroup/' . $faqgroup->id . '/edit')}}" class="list-group-item">
            {{ app()->getLocale() == 'ar'? $faqgroup->title : $faqgroup->title_en}}
        </a>
    @endforeach
</ul> --}}
<ul class="list-group list-group-flush p-0">
    @foreach ($faqgroups as $faqgroup)

        <li class="list-group-item text-center p-0 border-0">
            <h5 class="m-0 p-3 border-bottom">{{app()->getLocale() == 'ar' ? $faqgroup->title : $faqgroup->title_en}}</h5>
            <div class="accordion" id="accordionFAQ_{{$faqgroup->id}}">
                
                @foreach ($faqs as $faq)
                    
                    @if ($faq->faq_group_id == $faqgroup->id)
                        
                    
                    <div class="card border-0 rounded-0" style="border-bottom: 1px solid #ccc!important">
                        <div class="card-header d-flex justify-content-between align-items-center px-1" id="heading_{{$faq->id}}">
                            <button class="btn {{app()->getLocale() == 'ar' ? 'text-right' : 'text-left'}} shadow-none text-primary" type="button" data-toggle="collapse" data-target="#collapse_{{$faq->id}}" aria-expanded="true" aria-controls="collapse_{{$faq->id}}">
                                {{app()->getLocale() == 'ar' ? $faq->question : $faq->question_en}}
                            </button>
                            <div>
                                <a class="btn btn-link shadow-none" href="/admin/faq/{{$faq->id}}/edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                                <button 
                                class="btn btn-link btnDelete shadow-none" 
                                data-toggle="modal" 
                                data-target="#deleteModal{{$faq->id}}">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                    </svg>
                                </button>
                    
                                <div class="modal fade" id="deleteModal{{$faq->id}}" tabindex="-1" role="dialog" aria-hidden="false">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header border-0" dir="ltr">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{__('Would you like to delete this record?')}}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="/admin/faq/{{$faq->id}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-primary" id="accepted">{{__('Yes')}}</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="declined">{{__('No')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
 </ul> 

@endsection