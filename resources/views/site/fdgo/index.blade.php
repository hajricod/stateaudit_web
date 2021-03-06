@extends('layouts.app')

@section('content')

<div class="container">
    <h4>{{__('Financial Disclosure for Government Official')}}</h4>
    <hr>
    <div class="row">
        @if (lang() == 'ar')
            <div class="col-md-12 pt-3 pb-3">
                <p>
                    إقرار الذمة المالية هو عبارة عن وسيلة يقر من خلالها المسؤول الحكومي
                    ما له وزوجه وأولاده القصر من أموال نقدية أو عقارية أو منقولة داخل السلطنة أو خارجها بما في ذلك الأسهم
                    والسندات والحصص في الشركات والحسابات البنكية ويدخل في ذلك أيضاً ما لهم من حقوق وما عليهم من التزامات.
                </p>

                <h6>خطوات تقديم الإقرار:</h6>
                <ol>
                    <li>
                        تحميل نموذج الإقرار من خلال الرابط المخصص وفقاً لصيغة البرنامج التي تتناسب مع جهاز المقر.
                    </li>
                    <li>
                        تعبئة الإقرار الكترونياً.
                    </li>
                    <li>
                        في حال عدم كفاية أي ورقة يتم تصويرها وتعبئتها.
                    </li>
                    <li>
                        التوقيع على كل ورقة من الإقرار.
                    </li>
                    <li>
                        وضع الإقرار في ظرف محكم الاغلاق.
                    </li>
                </ol>

                <hr>

                <h6>في حال وجود أي استفسار يمكن الاتصال على الأرقام التالية:</h6>
                <p><a href="tel:+96822070292">22070292</a></p>
                <h6>الدعم الفني:</h6>
                <p><a href="tel:+96822070184">22070184</a> / <a href="tel:+96822070154">22070154</a></p>

                <div class="row mt-5">
                    <div class="col-md-10 offset-md-1">
                        <ul class="list-group list-group-flush shadow-sm px-0">
                            <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action p-3"
                            href="{{asset('storage/fdgo/steps.jpg')}}" target="_blank">
                            خطوات تقديم إقرار الذمة المالية للمسؤول الحكومي
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                    <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                                </svg>
                            </a>
                            <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action p-3"
                            href="{{asset('storage/fdgo/daleel_ar.pdf')}}" target="_blank">
                            دليل تعبئة نموذج إقرار الذمة المالية للمسؤول الحكومي
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                    <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                                </svg>
                            </a>
                            <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action p-3"
                            href="{{asset('storage/fdgo/arDisc_16.docx')}}" target="_blank">
                            إقرار الذمة المالية للمسؤول الحكومي (MS Word 2010-2016)
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                    <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                                </svg>
                            </a>
                            <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action p-3"
                            href="{{asset('storage/fdgo/arDisc_07.docx')}}" target="_blank">
                            إقرار الذمة المالية للمسؤول الحكومي (MS Word 2007)
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                    <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                                </svg>
                            </a>

                        </ul>                    
                    </div>
                </div>

            </div>

            @else
            <div class="col-md-12 pt-5 pb-3">
                <p>
                    A Financial Declaration Form requires public officials to disclose information regarding cash balances, real estate or movable properties in Oman or abroad besides financial securities, bonds, shares or equities possessed by themselves, their spouses or their dependent child. Furthermore, they are required to disclose liabilities owed to creditors or rights payable to them, their spouses, or dependent child.
                </p>

                <h6>Instructions to submit the financial Declaration form:</h6>
                <ol>
                    <li>
                        Download the form from the specific link.
                    </li>
                    <li>
                        Fill the form electronically.
                    </li>
                    <li>
                        In case of inadequacy of any section’s page, the required page should be scanned and filled out.
                    </li>
                    <li>
                        The public official should sign every single page of the form.
                    </li>
                    <li>
                        The form must be sent in a sealed envelope.
                    </li>
                </ol>

                <hr>

                <h6>In case of any inquires/ information please contact:</h6>
                <p><a href="tel:+96822070292">22070292</a></p>
                <h6>For Technical Support:</h6>
                <p><a href="tel:+96822070184">22070184</a> / <a href="tel:+96822070154">22070154</a></p>

                <div class="row mt-5">
                    <div class="col-md-10 offset-md-1">
                        <ul class="list-group list-group-flush shadow-sm px-0">
                            <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action p-3"
                            href="{{asset('storage/fdgo/enDisc_16.docx')}}" target="_blank">
                                Financial Disclosure for government Official (MS word 2010-2016)
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                    <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                                </svg>
                            </a>
                            <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action p-3"
                            href="{{asset('storage/fdgo/enDisc_07.docx')}}" target="_blank">
                                Financial Disclosure for government Official (MS word 2007)
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                    <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                                </svg>
                            </a>
                        </ul>                    
                    </div>
                </div>

            </div>
        @endif
    </div>
</div>

@endsection