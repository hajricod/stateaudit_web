@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (lang() == 'ar') 
            <div class="col-md-12 bg-white pt-5 pb-3" style="min-height: 80vh">
                <h4>هيئة مكافحة ومنع الفساد</h4>
                <hr>
                <p>
                    إيماناً من حكومة السلطنة بأهمية مكافحة الفساد فقد صدر المرسوم السلطاني رقم (64/2013) بالموافقة
                    على انضمام السلطنة في اتفاقية الأمم المتحدة لمكافحة الفساد ومنع الفساد، الأمر الذي عكس حرص السلطنة
                    على التعاون مع المجتمع الدولي للقضاء على جميع أعمال الفساد المجرمة، وقد كُلِّف جهاز الرقابة المالية والإدارية
                    للدولة بمهمة هيئة مكافحة ومنع الفساد ومتابعة تنفيذ الاتفاقية، مما يعمل معه الجهاز جاهداً بالتنسيق مع جهات
                    الاختصاص لمتابعة تنفيذ الاتفاقية -المشار إليها-بما يضمن تنفيذ السلطنة لالتزاماتها الدولية في هذا الشأن.
                </p>


                <div class="row pt-5">
                    <div class="col-md-8 offset-md-2">
                        <div class="accordion" id="accordion">
                            <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-center text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    التشريعات
                                </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush pr-0">
                                        <li class="list-group-item">
                                            <a href="">
                                                اتفاقية الامم المتحدة لمكافحة الفساد
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="">
                                                الاتفاقية العربية لمكافحة الفساد
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="">
                                                اتفاقية مكافحة رشوة الموظفين العموميين الأجانب
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="">
                                                الدليل التشريعي لاتفافيه الامم المتحدة لمكافحة الفساد
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="">
                                                النظام الداخلي لاجتماع الدول الاطراف
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="">
                                                الية استعراض اتفاقية الامم المتحدة لمكافحة الفساد
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="">
                                                قانون الجزاء
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="">
                                                قانون الرقابة المالية والادارية للدولة
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="">
                                                قانون حماية المال العام وتجنب تضارب المصالح
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="">
                                                قانـون مكافحة غسـل الأموال وتمويــل الإرهاب
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            </div>

                            <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-center text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    جهود السلطنة
                                </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush pr-0">
                                        <li class="list-group-item">
                                            <a href="">
                                                تقرير استعراض تنفيذ السلطنة لاتفاقية الأمم المتحدة لمكافحة الفساد
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="">
                                                الخلاصة الوافية
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            </div>

                            <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-center text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    روابط ذات صلة
                                </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush pr-0">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <a href="">
                                                صفحة السلطنة في مكتب الأمم المتحدة المعني بالمخدرات والجريمة
                                            </a>
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-link" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z"/>
                                                <path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z"/>
                                            </svg>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <a class="btn btn-primary btn-block text-center" type="button" href="/complaint/create" target="blank">
                                    {{__('Complaints Window')}}
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-up-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                                    </svg>
                                    </a>
                                </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-12 bg-white pt-5 pb-3" style="min-height: 80vh">
                <p class="text-center">This page is not available in English</p>
            </div>
        @endif
    </div>
</div>
@endsection