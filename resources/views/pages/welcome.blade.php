@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12 bg-white pt-5 pb-3">
            
            @if (lang() == 'ar')
            <article>
                <h4>الكلمة الترحيبية</h4>
                <hr>
                <div class="float-md-left p-2 text-center">
                    <img src="{{asset('/images/nasser_mawali.jpg')}}" width="300" alt="Nasser Al Mawali">
                    <div class="p-2 text-center">
                        <p>
                            <b>
                                ناصر بن هلال بن ناصر المعولي 
                                <br>
                                رئيس جهاز الرقابة المالية والإدارية للدولة 
                            </b> 
                        </p>
                    </div>
                </div>
                
                <p>
                    في ضوء السياسة الحكيمة لحضرة صاحب الجلالة السلطان المعظم - حفظه الله ورعاه - التي تجلت في توسيع صلاحيات جهاز الرقابة المالية للدولة لتشمل الرقابة الإدارية ، وتشريف جلالته - حفظه الله - لي برئاسة هذا الصرح الكبير ، تقديراً من جلالته بدوره ، وإيماناً منه برسالته ، فهي مسؤولية عزيزة وغالية ، وتشريفاً سامياً ، عقدنا معه العزم مع إخوتي وأخواتي منتسبي الجهاز على أن نكون أهلاً له .
                </p>
                <p>
                    فقد استوجبت المرحلة الراهنة تطوير أبعاد العمل الرقابي ، و التركيز على الأهداف التي يسعى الجهاز إلى تحقيقها ، وفي مقدمتها توفير الحماية الواجبة للأموال العامة والتحقق من استخدام الموارد بطريقة اقتصادية وبكفاءة وفاعلية ، مُلبين في ذات الوقت آمال وطموحات المجتمع في "المزيد من المساءلة والشفافية والعدالة في الأداء الحكومي".
                </p>
                <p>
                    ومن هذا المنطلق بات من الضروري على جهاز الرقابة المالية والإدارية للدولة أن يسعى إلى تطوير وتحديث وظائفه وأسلوب عمله ، واضعاً في الإعتبار المتغيرات المحلية والإقليمية والدولية.
                </p>
                <p>
                    لهذا كله وضعنا برنامجاً للعمل ومنهجية للأداء ، تقوم على المعيار العلمي وتتماشى مع الواقع العملي ، ويرتكز على ركائز جوهرية اهمها الاعتماد على روح التعاون البناء والتآزر الصادق مع الجهات الخاضعة للرقابة والمجتمع .
                </p>
                <p>
                    وقد أطل هذا الموقع بحلته الجديدة مع النافذة المهمة والتي تُعنى باستفسارات المواطنين وملاحظاتهم لتفعيل جسور التواصل بين الجهاز وكافة المواطنين والمهتمين أينما كانوا .
                </p>
            </article>

            @else
            <article>
                <h4>Welcome</h4>
                <hr>
                <div class="float-md-left p-2 text-center">
                    <img src="{{asset('/images/nasser_mawali.jpg')}}" width="300" alt="Nasser Al Mawali">
                    <div class="p-2 text-center">
                        <p>
                            <b>
                                Nasser H.N.Al Mawali
                                <br>
                                Chairman
                                <br>
                                State Audit Institution
                            </b> 
                        </p>
                    </div>
                </div>
                
                <p>
                    In light of the wise and visionary leadership of His Majesty Sultan Qaboos bin Said and his deep belief in the significant role and mission of State Audit Institution (SAI), His Majesty extended its prerogatives to include administrative oversight. I consider the honor His Majesty bestowed on me to head this prestigious institution as a noble and precious responsibility and royal generosity. All the SAI staff, including myself, has undertaken to prove we are worthy of such honor.
                </p>
                <p>
                    The current stage calls for the development of the various aspects of oversight mechanism and more focus on the objectives SAI attempts to realize, notably the due protection of public funds and ensuring the economic, efficient and effective use of resources. At the same time, we have to fulfill the aspirations and ambitions of our society towards “more accountability, transparency, and fairness in government performance.”
                </p>
                <p>
                    Therefore, it has become imperative that SAI develop and update its functions and the way it operates taking into consideration the local, regional and international variables and developments.
                </p>
                <p>
                    At SAI, we have developed an action plan and a performance methodology based on scientific criteria and essential foundations, notably leveraging the spirit of constructive cooperation and sincere synergy with auditees and the society in such a manner that conforms to and satisfies practical reality.
                </p>
                <p>
                    As a part of the new approach, this new website has an important section on citizens’ enquiries and feedback in order to activate communication between SAI and all citizens and stakeholders wherever they may be.
                </p>
            </article>
            @endif
        </div>
    </div>
</div>
@endsection