@extends('layouts.app')

@section('content')
<div class="container">
    <h4>{{__('Combating and Preventing Corruption')}}</h4>
    <hr>
    <div class="row">
        @if (lang() == 'ar') 
            <div class="col-md-12 bg-white pt-5 pb-3" style="min-height: 80vh">
                <p>
                    إيماناً من حكومة السلطنة بأهمية مكافحة الفساد فقد صدر المرسوم السلطاني رقم (64/2013) بالموافقة
                    على انضمام السلطنة في اتفاقية الأمم المتحدة لمكافحة الفساد ومنع الفساد، الأمر الذي عكس حرص السلطنة
                    على التعاون مع المجتمع الدولي للقضاء على جميع أعمال الفساد المجرمة، وقد كُلِّف جهاز الرقابة المالية والإدارية
                    للدولة بمهمة هيئة مكافحة ومنع الفساد ومتابعة تنفيذ الاتفاقية، مما يعمل معه الجهاز جاهداً بالتنسيق مع جهات
                    الاختصاص لمتابعة تنفيذ الاتفاقية -المشار إليها-بما يضمن تنفيذ السلطنة لالتزاماتها الدولية في هذا الشأن.
                </p>


                <div class="row pt-5">
                    <div class="col-md-8 offset-md-2">
                        <div class="accordion" id="accordionAnticorruption">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading_1">
                                    <button class="shadow-none accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="true" aria-controls="collapse_1">
                                        التشريعات
                                    </button>
                                </h2>
                                <div id="collapse_1" class="accordion-collapse collapse" aria-labelledby="heading_1" data-bs-parent="#accordionAnticorruption">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush px-0">
                                            <a href="{{asset('storage/anticorruption/anticorruption1.pdf')}}" class="list-group-item list-group-item-action">
                                                اتفاقية الامم المتحدة لمكافحة الفساد
                                            </a>
                                            <a href="{{asset('storage/anticorruption/anticorruption2.pdf')}}" class="list-group-item list-group-item-action">
                                                الاتفاقية العربية لمكافحة الفساد
                                            </a>
                                            <a href="{{asset('storage/anticorruption/anticorruption20181.pdf')}}" class="list-group-item list-group-item-action">
                                                اتفاقية مكافحة رشوة الموظفين العموميين الأجانب
                                            </a>
                                            <a href="{{asset('storage/anticorruption/anticorruption20182.pdf')}}" class="list-group-item list-group-item-action">
                                                الدليل التشريعي لاتفافيه الامم المتحدة لمكافحة الفساد
                                            </a>
                                            <a href="{{asset('storage/anticorruption/anticorruption20183.pdf')}}" class="list-group-item list-group-item-action">
                                                النظام الداخلي لاجتماع الدول الاطراف
                                            </a>
                                            <a href="{{asset('storage/anticorruption/anticorruption20184.pdf')}}" class="list-group-item list-group-item-action">
                                                الية استعراض اتفاقية الامم المتحدة لمكافحة الفساد
                                            </a>
                                            <a href="{{asset('storage/anticorruption/penal_code.pdf')}}" class="list-group-item list-group-item-action">
                                                قانون الجزاء
                                            </a>
                                            <a href="{{asset('storage/anticorruption/sai_law.pdf')}}" class="list-group-item list-group-item-action">
                                                قانون الرقابة المالية والادارية للدولة
                                            </a>
                                            <a href="{{asset('storage/anticorruption/financial_law.pdf')}}" class="list-group-item list-group-item-action">
                                                قانون حماية المال العام وتجنب تضارب المصالح
                                            </a>
                                            <a href="{{asset('storage/anticorruption/money_laundring_law.pdf')}}" class="list-group-item list-group-item-action">
                                                قانـون مكافحة غسـل الأموال وتمويــل الإرهاب
                                            </a>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading_2">
                                  <button class="shadow-none accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_2" aria-expanded="true" aria-controls="collapse_2">
                                    جهود السلطنة
                                  </button>
                                </h2>
                                <div id="collapse_2" class="accordion-collapse collapse" aria-labelledby="heading_2" data-bs-parent="#accordionAnticorruption">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush px-0">
                                            <a href="{{asset('storage/anticorruption/oman_report_2018.pdf')}}" class="list-group-item list-group-item-action">
                                                تقرير استعراض تنفيذ السلطنة لاتفاقية الأمم المتحدة لمكافحة الفساد
                                            </a>
                                            <a href="{{asset('storage/anticorruption/summary_2018.pdf')}}" class="list-group-item list-group-item-action">
                                                الخلاصة الوافية
                                            </a>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading_3">
                                  <button class="shadow-none accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_3" aria-expanded="true" aria-controls="collapse_3">
                                    روابط ذات صلة
                                  </button>
                                </h2>
                                <div id="collapse_3" class="accordion-collapse collapse" aria-labelledby="heading_3" data-bs-parent="#accordionAnticorruption">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush px-0">
                                            <a href="https://www.unodc.org/unodc/en/corruption/country-profile/countryprofile.html#?CountryProfileDetails=%2Funodc%2Fcorruption%2Fcountry-profile%2Fprofiles%2Fomn.html" class="list-group-item list-group-item-action">
                                                صفحة السلطنة في مكتب الأمم المتحدة المعني بالمخدرات والجريمة
                                            </a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <a href="/complaint/create" class="list-group-item list-group-item-action border-0 py-3">
                                    {{__('Complaints Window')}}
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-up-right float-start m-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>


                        <div class="accordion" id="accordion">
                            {{-- <div class="card">
                                <div class="card-header" id="headingOne">
                                    
                                    <div class="d-grid gap-2">
                                        <button class="btn shadow-none dropdown-toggle text-center text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            التشريعات
                                        </button>
                                    </div>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body p-0">
                                        <ul class="list-group list-group-flush px-0">
                                            <a href="#" class="list-group-item list-group-item-action">
                                                اتفاقية الامم المتحدة لمكافحة الفساد
                                            </a>
                                        
                                            <a href="#" class="list-group-item list-group-item-action">
                                                الاتفاقية العربية لمكافحة الفساد
                                            </a>
                                        
                                            <a href="#" class="list-group-item list-group-item-action">
                                                اتفاقية مكافحة رشوة الموظفين العموميين الأجانب
                                            </a>
                                        
                                            <a href="#" class="list-group-item list-group-item-action">
                                                الدليل التشريعي لاتفافيه الامم المتحدة لمكافحة الفساد
                                            </a>
                                        
                                            <a href="#" class="list-group-item list-group-item-action">
                                                النظام الداخلي لاجتماع الدول الاطراف
                                            </a>
                                        
                                            <a href="#" class="list-group-item list-group-item-action">
                                                الية استعراض اتفاقية الامم المتحدة لمكافحة الفساد
                                            </a>
                                        
                                            <a href="#" class="list-group-item list-group-item-action">
                                                قانون الجزاء
                                            </a>
                                        
                                            <a href="#" class="list-group-item list-group-item-action">
                                                قانون الرقابة المالية والادارية للدولة
                                            </a>
                                        
                                            <a href="#" class="list-group-item list-group-item-action">
                                                قانون حماية المال العام وتجنب تضارب المصالح
                                            </a>

                                            <a href="#" class="list-group-item list-group-item-action">
                                                قانـون مكافحة غسـل الأموال وتمويــل الإرهاب
                                            </a>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="card">
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
                            </div> --}}

                            {{-- <div class="card">
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
                            </div> --}}

                            {{-- <div class="card">
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
                            </div> --}}
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