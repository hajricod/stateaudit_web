@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 pb-3 min-h-80">
            <h4>{{__('Historical Development')}}</h4>
            <hr>
            @if (lang() == 'ar')
            <article class="bg-white p-3 shadow-sm rounded">
                <div class="p-2 history-holder px-5">
                    <div class="history-section">
                        <span class="year-tag">1970</span>
                        <p class="pt-5"></p>
                        <p class="pt-2 px-2">
                            بدأت الرقابة المالية مع إشراقة عصر النهضة المباركة في عام 1970 م ممثلة في دائرة تدقيق الحسابات بالمديرية العامة للمالية وكان دورها يقتصر على تدقيق السندات قبل الصرف.
                        </p>
                    </div>
                    <div class="history-section">
                        <span class="year-tag">1974</span>
                        <p class="pt-5"></p>
                        <p class="pt-2 px-2">
                            إستقلت دائرة تدقيق الحسابات عن دائرة المالية وفقاً للمرسوم السلطاني رقم 6 / 74 الصادر بتاريخ 12/2/1974م لتكون تحت مسؤولية وزارة شؤون الديوان السلطاني وانيط بها الرقابة المالية على الأجهزة الإدارية ومعالجة ما يعن لها من ملاحظات ، ثم شرعت في ابلاغ تقاريرها مع بداية عام 1975م ، كما عنيت آنذاك بتدريب موظفي الأجهزة الإدارية بهدف تحسين ادائهم .
                        </p>
                    </div>
                    <div class="history-section">
                        <span class="year-tag">1975</span>
                        <p class="pt-5"></p>
                        <p class="pt-2 px-2">
                            خلال عام 1975م صدر قانون تنظيم الجهاز الإداري للدولة بالمرسوم السلطاني رقم 26 / 75 وأتبعت دائرة تدقيق الحسابات إلى وزارة شؤون البلاط السلطاني إلى أن صدر المرسوم السلطاني رقم 24 / 81 بإعتماد الهيكل التنظيمي لهذه الوزارة وتحولت الدائرة إلى مديرية عامة لتدقيق الحسابات حتى عام 1983م حيث أتبعت المديرية العامة مباشرة إلى معالي السيد وزير شؤون الديوان السلطاني بالمرسوم السلطاني رقم 65 / 83 .
                        </p>
                    </div>
                    <div class="history-section">
                        <span class="year-tag">1985</span>
                        <p class="pt-5"></p>
                        <p class="pt-2 px-2">
                            صدر أول قانون يختص بتنظيم تدقيق حسابات الدولة بتاريخ 10/3/1985م بالمرسوم السلطاني رقم 36/85 متضمناً الأهداف والاختصاصات والمسؤوليات المنوطة بالمديرية العامة ومحدداًً الجهات الخاضعة لرقابتها والتقارير الدورية والسنوية الصادرة عنها.
                        </p>
                    </div>
                    <div class="history-section">
                        <span class="year-tag">1989</span>
                        <p class="pt-5"></p>
                        <p class="pt-2 px-2">
                            عدل مسمى المديرية العامة لتدقيق الحسابات اعتبارا من 3/1/1989 م بموجب المرسوم السلطاني رقم 81/89 إلى الأمانة العامة لتدقيق الحسابات ، وبتاريخ 30/12/1991م صدر المرسوم السلطاني رقم 129/91 الذي عدل مسماها لتكون الأمانة العامة للرقابة المالية للدولة متضمنا قانون الرقابة المالية للدولة ليحل محل نظام تدقيق الحسابات المشار إليه .
                        </p>
                    </div>
                    <div class="history-section">
                        <span class="year-tag">1999</span>
                        <p class="pt-5"></p>
                        <p class="pt-2 px-2">
                            بتاريخ 22/11/1999م صدر المرسوم السلطاني رقم 95/99 بتعديل مسمى الأمانة العامة للرقابة المالية للدولة إلى جهاز الرقابة المالية للدولة كجهاز قائم بذاته يتمتع بالإستقلال المالي والإداري ، وتعيين معالي السيد/ عبدالله بن حمد بن سيف البوسعيدي رئيساً للجهاز ليكتمل له كل مقومات الاستقلال والحياد وما تبعه من إصدار قانون جديد للرقابة المالية بالمرسوم السلطاني 55 / 2000 وإعتماد الهيكل التنظيمي الجديد للجهاز بالمرسوم السلطاني 56 / 2000 ليطل الجهاز خلال هذه المرحلة التي إستمرت قرابة ثلاثة عقود ونصف وقد إكتملت له كل المقومات المؤهلة لمسايرة ركب الأجهزة الرقابية الدولية.
                        </p>
                    </div>
                    <div class="history-section">
                        <span class="year-tag">2011</span>
                        <p class="pt-5"></p>
                        <div class="pt-2 px-2">
                            <p>
                                بتاريخ 2/3/2011م صدر المرسوم السلطاني رقم 27/2011 في شأن تعديل مسمى جهاز الرقابة المالية للدولة إلى جهاز الرقابة المالية والإدارية للدولة ، وتعيين معالي الشيخ / ناصر بن هلال بن ناصر المعولي رئيسا له .
                            </p>
                            <p>
                                وبتاريخ 24/10/2011 صـدر المــرسوم السلطاني رقم 111/2011 بإصدار قانون الرقابة المالية والإدارية للدولة .
                            </p>
                        </div>
                    </div>
                </div>
            </article>
            @else
            <article class="bg-white p-3 shadow-sm rounded">
                <div class="p-2 history-holder px-5">
                    <div class="history-section">
                        <span class="year-tag">1970</span>
                        <p class="pt-5"></p>
                        <div class="pt-2 px-2">
                            <p>
                                Since his accession to power in 1970, His Majesty Sultan Qaboos bin Saidpaid utmost attention to external oversight through an independent auditmechanism . Over a span of more than four decades now, it has witnessed severalphases of development and modernization as shown below:
                            </p>
                            <p>
                                Financial Audit started after the Renaissance in 1970 as a minor department under the Directorate General of Finance. Its role was limited to pre-audit of payment vouchers.
                            </p>
                        </div>
                    </div>
                    <div class="history-section">
                        <span class="year-tag">1974</span>
                        <p class="pt-5"></p>
                        <p class="pt-2 px-2">
                            In 1974, Royal Decree No. 6/74 annexed the above mentioned minor department to the Ministry of Royal Court Affairs as of 12/2/1974. Its prerogatives included auditing the administrative organs of the State and training their staff to enhance their performance. It issued its audit reports at the beginning of 1975.
                        </p>
                    </div>
                    <div class="history-section">
                        <span class="year-tag">1975</span>
                        <p class="pt-5"></p>
                        <p class="pt-2 px-2">
                            In 1975, Royal Decree No. 26/75 issued the Law on the Organization of State Administrative Apparatus and the Audit Department became under the Ministry Royal Court Affairs. In 1981, Royal Decree No. 24/81 endorsed the organizational structure of that Ministry and upgraded the minor department to a Directorate General. Royal Decree No. 65/83 made it under the direct supervision of His Excellency the Minister of the Royal Court Affairs.
                        </p>
                    </div>
                    <div class="history-section">
                        <span class="year-tag">1985</span>
                        <p class="pt-5"></p>
                        <p class="pt-2 px-2">
                            On 10/3/1985, Royal Decree No. 36/85 issued the first regulation on auditing State accounts. The regulation laid down the audit objectives, jurisdiction, prerogatives, procedures, auditees and periodical and annual reports to be issued by the Directorate General.
                        </p>
                    </div>
                    <div class="history-section">
                        <span class="year-tag">1989</span>
                        <p class="pt-5"></p>
                        <p class="pt-2 px-2">
                            Later on 3/1/1989, the name of the Directorate General for Auditing Accounts was changed to the Secretariat General for Auditing Accounts pursuant to Royal Decree No. 129/91. Royal Decree No. 129/91, while promulgating State Audit Law, changed the name again to the Secretariat General for State Audit.
                        </p>
                    </div>
                    <div class="history-section">
                        <span class="year-tag">1999</span>
                        <p class="pt-5"></p>
                        <div class="pt-2 px-2">
                            <p>
                                Royal Decree No. 95/99 dated 22/11/1999 amended the name of the Secretariat General for State Audit to State Audit Institution (SAI) as an governmental organ with financial and administrative autonomy. His Excellency Sayyid Abdullah bin Hamad bin Saif Al-Busaidi was appointed as its first Chairman. This was a decisive turning point that ensured and asserted the desirable audit autonomy and neutrality.
                            </p>
                            <p>
                                The new State Audit Law was promulgated by Royal Decree No. 55/2000 while Royal Decree No. 56/2000 endorsed its new organizational structure to facilitate achievement of its objectives and fulfilment of its responsibilities.
                            </p>
                        </div>
                    </div>
                    <div class="history-section">
                        <span class="year-tag">2011</span>
                        <p class="pt-5"></p>
                        <p class="pt-2 px-2">
                            On 2/3/2011, Royal Decree No. 27/2011 radically reengineered the State Audit Institution  expanding its role, functions and responsibilities and empowering it with necessary authority.  It also appointed His Excellency Shaikh/ Nasser bin Hilal bin Nasser Al-Mawali as its Chairman.
                        </p>
                    </div>
                </div>
            </article>
            @endif
        </div>
    </div>
</div>

@endsection