@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 pb-3 min-h-80">
            <h4>{{__('International Relations')}}</h4>
            <hr>
            <article class="bg-white p-3 shadow-sm rounded">
                @if (lang() == 'ar')
                    <p>
                        يحرص الجهاز على تعزيز علاقاته بكافة الأجهزة الرقابية على المستوى العربي والإقليمي والدولي لما فيه تحقيق المصالح المشتركة وتبادل الخبرات والمعارف وتعزيز العلاقات من خلال المنظمات العربية والإقليمية والدولية ، وذلك من خلال ما يأتي:
                    </p>
                    <ol>
                        <li class="py-2">المشاركة في المنظمات التي تضم الأجهزة العليا للرقابة المالية والمحاسبة ، إذ يشارك الجهاز في عضوية المنظمات الموضحة:
                            <ul>
                                <li class="py-2">المنظمة الدولية للجهزة العليا للرقابة المالية والمحاسبة (الأنتوساي)</li>
                                <li class="py-2">المجموعة الآسيوية للأجهزة العليا للرقابة المالية والمحاسبة (الأسوساي)</li>
                                <li class="py-2">المنظمة العربية للأجهزة العليا للرقابة المالية والمحاسبة (الأربوساي)</li>
                            </ul>
                        </li>
                        <li class="py-2">
                            عضوية الجهاز في بعض اللجان المنبثقة عن المنظمة الدولية للأجهزة العليا للرقابة المالية والمحاسبة (الأنتوساي):
                            <ul>
                                <li class="py-2">لجنة معايير الرقابة الداخلية</li>
                                <li class="py-2">مجموعة عمل الرقابة على الخصخصة</li>
                                <li class="py-2">لجنة تدقيق نظم المعلومات</li>
                                <li class="py-2">لجنة بناء القدرات</li>
                            </ul>
                        </li>
                        <li class="py-2">المشاركة في لجنتي رؤساء ووكلاء أجهزة ودواوين المراقبة والمحاسبة ، ولجنة التدريب والتطوير التابعة للأمانة العامة لمجلس التعاون
                            لدول الخليج العربية</li>
                        <li class="py-2"> تبادل الزيارات الرسمية مع رؤساء وممثلي الأجهزة النظيرة العربية والدولية بهدف الاطلاع على التجارب وتبادل الخبرات والمعارف</li>
                        <li class="py-2">استضافة الجهاز لمجموعة من الاجتماعات والفعاليات الدولية المتعلقة بالعمل الرقابي</li>
                        <li class="py-2">تنفيذ برامج تدريبية مشتركة مع بعض الأجهزة الرقابية</li>
                    </ol>
                @else
                    <p>
                        For mutual benefit, exchange of knowledge and experience, and fostering cooperation, State Audit Institution (SAI) has maintained excellent relations with its Arab, regional and international counterparts.
                    </p>
                    <ol>
                        <li class="py-2">SAI is an active member at the following international organizations of Supreme Audit Institutions:
                            <ul>
                                <li class="py-2">International Organization of Supreme Audit Institutions (INTOSAI)</li>
                                <li class="py-2">Asian Organization of Supreme Audit Institutions (ASOSAI)</li>
                                <li class="py-2">Arab Organization of Supreme Audit Institutions (ARABOSAI)</li>
                            </ul>
                        </li>
                        <li class="py-2">
                            SAI is a member of the following INTOSAI Committees:
                            <ul>
                                <li class="py-2">Internal Control Standards Committee</li>
                                <li class="py-2">INTOSAI Audit Group on Audit of Privatization</li>
                                <li class="py-2">Information Technology Audit Committee</li>
                                <li class="py-2">Capacity Building Committee</li>
                            </ul>
                        </li>
                        <li class="py-2">SAI participates in the committees of the Chairmen and Vice Chairmen of audit Institutions and the Committee of Training and Development of the GCC Secretariat</li>
                        <li class="py-2">SAI exchanges visits with Arab and international counterparts to be familiar with their experience and exchange of knowledge</li>
                        <li class="py-2">SAI hosted a number of international audit meetings and events</li>
                        <li class="py-2">SAI conducts joint training courses with some audit institutions</li>
                    </ol>
                @endif
            </article>
        </div>
    </div>
</div>

@endsection