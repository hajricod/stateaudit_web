@extends('layouts.admin')

@section('content')

<div class="d-flex justify-cotent-start align-items-center">
    <x-back-button url='/admin/faq' title="{{__('FAQ')}}" />
    <x-add-button url='/admin/faqgroup/create' title="{{__('Add Section')}}" />
    <h3 class="m-0">{{__('FAQ Sections')}}</h3>
</div>

<hr>

<ul class="list-group p-0">
    @foreach ($faqgroups as $faqgroup)
        <a href="{{url('/admin/faqgroup/' . $faqgroup->id . '/edit')}}" class="list-group-item">
            {{ app()->getLocale() == 'ar'? $faqgroup->title : $faqgroup->title_en}}
        </a>
    @endforeach
</ul>
@endsection