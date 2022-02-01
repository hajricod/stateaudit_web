@extends('layouts.app')

@section('content')

<div class="container">
    <h4>{{__('Laws and Regulations')}}</h4>
    <hr>
    <div class="row">
        @if (lang() == 'ar') 
            <div class="col-md-12 pt-5 pb-3" style="min-height: 80vh">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <ul class="list-group list-group-flush px-0 shadow-sm">
                            <a href="{{asset('storage/laws/org_chart_ar.jpg')}}" target="_blank" class="list-group-item list-group-item-action p-3">
                                الهيكل التنظيمي
                            </a>
                            <a href="{{asset('storage/laws/111-2011.pdf')}}" target="_blank" class="list-group-item list-group-item-action p-3">
                                قانون الرقابة المالية والادارية للدولة
                            </a>
                            <a href="{{asset('storage/laws/112-2011.pdf')}}" target="_blank" class="list-group-item list-group-item-action p-3">
                                قانون حماية المال العام وتجنب تضارب المصالح
                            </a>
                            {{-- <a href="{{asset('storage/laws/sai_law_en.pdf')}}" target="_blank" class="list-group-item list-group-item-action">
                                قانون الرقابة المالية والإدارية للدولة باللغة الإنجليزية
                            </a> --}}
                            <a href="{{asset('storage/laws/113-2013.pdf')}}" target="_blank" class="list-group-item list-group-item-action p-3">
                                اللائحة التنفيذية لقانون الرقابة المالية والإدارية للدولة
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            @else

            <div class="col-md-12 pt-5 pb-3" style="min-height: 80vh">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <ul class="list-group list-group-flush shadow-sm px-0">
                            <a href="{{asset('storage/laws/org_chart_en.jpg')}}" target="_blank" class="list-group-item list-group-item-action p-3">
                                SAI Organisation Chart
                            </a>
                            <a href="{{asset('storage/laws/sai_law_en.pdf')}}" target="_blank" class="list-group-item list-group-item-action p-3">
                                State Audit Institution Law
                            </a>
                            <a href="{{asset('storage/laws/112-2011.pdf')}}" target="_blank" class="list-group-item list-group-item-action p-3">
                                Law on the Protection of public Money and avoid conflicts of Intrests
                            </a>
                            {{-- <a href="{{asset('storage/laws/sai_law_en.pdf')}}" target="_blank" class="list-group-item list-group-item-action">
                                State Audit Institution Law in English
                            </a> --}}
                            <a href="{{asset('storage/laws/113-2013.pdf')}}" target="_blank" class="list-group-item list-group-item-action p-3">
                                State Audit Regulation
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@endsection