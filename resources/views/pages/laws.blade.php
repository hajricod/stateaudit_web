@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12 bg-white pt-5 pb-3 min-h-80">
            
            <article>
                <h4>القوانين والتشريعات</h4>
                <hr>
                <ul class="list-group list-group-flush pr-0 p-2">
                    <a class="list-group-item" href="{{asset('images/hierarchy.jpg')}}" target="_blank">الهيكل التنظيمي</a>
                    <a class="list-group-item" href="{{asset('docs/111-2011.pdf')}}" target="_blank">قانون الرقابة المالية والادارية للدولة</a>
                    <a class="list-group-item" href="{{asset('docs/112-2011.pdf')}}" target="_blank">قانون حماية المال العام وتجنب تضارب المصالح</a>
                    <a class="list-group-item" href="{{asset('docs/111-2011en.pdf')}}" target="_blank">قانون الرقابة المالية والإدارية للدولة باللغة الإنجليزية</a>
                    <a class="list-group-item" href="{{asset('docs/13-2013.pdf')}}" target="_blank">اللائحة التنفيذية لقانون الرقابة المالية والإدارية للدولة
                    </a>
                </ul>
            </article>
        </div>
    </div>
</div>
@endsection