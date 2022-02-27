@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 pb-3 min-h-80">
            @if (lang() == 'ar')
            <h4>{{__('التطور التاريخي')}}</h4>
            <hr>
            <article class="bg-white p-3 shadow-sm rounded">
                
                {{-- <ul class="nav nav-pills mb-3 pr-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-history-tab" data-bs-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="true">
                            التطور التاريخي للرقابة المالية والإدارية بالسلطنة
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-goals-tab" data-bs-toggle="pill" href="#pills-goals" role="tab" aria-controls="pills-goals" aria-selected="false">
                            أهداف الجهاز
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-specialization-tab" data-bs-toggle="pill" href="#pills-specialization" role="tab" aria-controls="pills-specialization" aria-selected="false">
                        إختصاصات الجهاز
                    </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-development-tab" data-bs-toggle="pill" href="#pills-development" role="tab" aria-controls="pills-development" aria-selected="false">
                            بعض ملامح التطوير والتحديث خلال الفترة 2011/2000
                        </a>
                    </li>
                </ul> --}}
                <div class="p-2 history-holder px-5">
                    
                    {{-- <div class="tab-content p-3 text-justify" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
                            <p>
                                حظيت الرقابة المالية على امتداد مسيرتها ولا تزال بالرعاية السامية من لدن المقام السامي لحضرة صاحب الجلالة السلطان قابوس بن سعيد المعظم – حفظه الله ورعاه – وفقاً لتطورها التاريخي الموضح بعد:
                            </p>
                            <ol class="listPadding">
                                <li>
                                    بدأت الرقابة المالية مع إشراقة عصر النهضة المباركة في عام 1970 م ممثلة في دائرة تدقيق الحسابات بالمديرية العامة للمالية وكان دورها يقتصر على تدقيق السندات قبل الصرف.
                                </li>
                                <li>
                                    إستقلت دائرة تدقيق الحسابات عن دائرة المالية وفقاً للمرسوم السلطاني رقم 6 / 74 الصادر بتاريخ 12/2/1974م لتكون تحت مسؤولية وزارة شؤون الديوان السلطاني وانيط بها الرقابة المالية على الأجهزة الإدارية ومعالجة ما يعن لها من ملاحظات ، ثم شرعت في ابلاغ تقاريرها مع بداية عام 1975م ، كما عنيت آنذاك بتدريب موظفي الأجهزة الإدارية بهدف تحسين ادائهم .
                                </li>
                                <li>
                                    خلال عام 1975م صدر قانون تنظيم الجهاز الإداري للدولة بالمرسوم السلطاني رقم  26 / 75 وأتبعت دائرة تدقيق الحسابات إلى وزارة شؤون البلاط السلطاني إلى أن صدر المرسوم السلطاني رقم 24 / 81 بإعتماد الهيكل التنظيمي لهذه الوزارة وتحولت الدائرة إلى مديرية عامة لتدقيق الحسابات حتى عام 1983م حيث أتبعت المديرية العامة مباشرة إلى معالي السيد وزير شؤون الديوان السلطاني بالمرسوم السلطاني رقم 65 / 83 .
                                </li>
                                <li>
                                    صدر أول قانون  يختص بتنظيم تدقيق حسابات الدولة بتاريخ 10/3/1985م بالمرسوم السلطاني رقم 36/85 متضمناً الأهداف والاختصاصات والمسؤوليات المنوطة بالمديرية العامة ومحدداًً الجهات الخاضعة لرقابتها والتقارير الدورية والسنوية الصادرة عنها.
                                </li>
                                <li>
                                    عدل مسمى المديرية العامة لتدقيق الحسابات اعتبارا من 3/1/1989 م بموجب المرسوم السلطاني رقم 81/89 إلى الأمانة العامة لتدقيق الحسابات ، وبتاريخ 30/12/1991م صدر المرسوم السلطاني رقم 129/91 الذي عدل مسماها لتكون الأمانة العامة للرقابة المالية للدولة متضمنا قانون الرقابة المالية للدولة ليحل محل نظام تدقيق الحسابات المشار إليه .
                                </li>
                                <li>
                                    بتاريخ 22/11/1999م صدر المرسوم السلطاني رقم 95/99 بتعديل مسمى الأمانة العامة للرقابة    المالية للدولة إلى جهاز الرقابة المالية للدولة كجهاز قائم بذاته يتمتع بالإستقلال المالي والإداري ، وتعيين معالي السيد/ عبدالله بن حمد بن سيف البوسعيدي رئيساً للجهاز ليكتمل له كل مقومات الاستقلال والحياد وما تبعه من إصدار قانون جديد للرقابة المالية بالمرسوم السلطاني 55 / 2000 وإعتماد الهيكل التنظيمي الجديد للجهاز بالمرسوم السلطاني 56 / 2000 ليطل الجهاز خلال هذه المرحلة التي إستمرت قرابة ثلاثة عقود ونصف وقد إكتملت له كل المقومات المؤهلة لمسايرة ركب الأجهزة الرقابية الدولية.
                                </li>
                                <li>
                                    بتاريخ 2/3/2011م صدر المرسوم السلطاني رقم 27/2011 في شأن تعديل مسمى جهاز الرقابة المالية للدولة إلى جهاز الرقابة المالية والإدارية للدولة ، وتعيين معالي الشيخ / ناصر بن هلال بن ناصر المعولي رئيسا له .
                                </li>
                                <li>
                                    بتاريخ 24/10/2011 صـدر المــرسوم السلطاني رقم 111/2011 بإصدار قانون الرقابة المالية والإدارية للدولة .
                                </li>
                            </ol>
                        </div>
                        <div class="tab-pane fade" id="pills-goals" role="tabpanel" aria-labelledby="pills-goals-tab">
                            <ol class="listPadding">
                                <li>
                                    حماية الأموال العامة للدولة والأموال الخاصة التي تديرها أو تشرف عليها أي من الوحدات الخاضعة لرقابة الجهاز والتثبت من مدى ملائمة أنظمة الضبط والرقابة الداخلية وسلامة التصرفات المالية والإدارية واتباعها للقوانين واللوائح والقرارات التنظيمية .
                                </li>
                                <li>
                                    التحقق من تنفيذ القوانين واللوائح والنظم والقرارات فيما يتعلق باختصاصاته.
                                </li>
                                <li>
                                    تجنب وقوع تضارب المصالح والمخالفات المالية والإدارية .
                                </li>
                                <li>
                                    بيان أوجه النقص أو القصور في القوانين واللوائح والأنظمة المالية والإدارية المعمول بها واقتراح وسائل علاجها.
                                </li>
                                <li>
                                    الإلتزام بمبدأ الشفافية في التصرفات المالية والإدارية.
                                </li>
                                <li>
                                    الرقابة الوقائية والتأكد من حسن سير العمل.
                                </li>
                                <li>
                                    تقييم أداء الجهات الخاضعة لرقابة الجهاز والتحقق من استخدام الموارد بطريقة اقتصادية وبكفاءة وفاعلية.
                                </li>
                                <li>
                                    الكشف عن أسباب القصور في الأداء والإنتاج وتحديد المسؤولية.
                                </li>
                            </ol>
                        </div>
                        <div class="tab-pane fade" id="pills-specialization" role="tabpanel" aria-labelledby="pills-specialization-tab">
                            <p>
                                يختص الجهاز بإجراء الرقابة المالية والإدارية في كافة المجالات ومنها:
                            </p>
                            <ol class="listPadding">
                                <li>
                                    الرقابة المالية بشقيها المحاسبي والقانوني.
                                </li>
                                <li>
                                    الرقابة الإدارية.
                                </li>
                                <li>
                                    رقابة الأداء.
                                </li>
                                <li>
                                    الرقابة على القرارات الصادرة في شأن المخالفات المالية.
                                </li>
                                <li>
                                    الرقابة على الاستثمارات وكافة حسابات الجهات الخاضعة لرقابة الجهاز.
                                </li>
                                <li>
                                    أي أعمال أخرى يكلف بها الجهاز من جلالة السلطان.
                                </li>
                            </ol>

                            <p>
                                وللجهاز في سبيل ممارسة اختصاصاته ما يأتي :
                            </p>

                            <ol>
                                <li>
                                    مراجعة تقارير تقييم الأصول للوحدات المراد تخصيصها ومشروعات العقود والاتفاقيات المحررة بشأنها قبل اتخاذ القرار النهائي بشأنها.
                                </li>
                                <li>
                                    مراجعة الإيرادات والمصروفات وسندات الصرف وسجلات المتحصلات المقيدة بالحسابات الآلية أو المسجلة على الأقراص بجميع أنواعها والحسابات المفتوحة من قبل الجهات الخاضعة لرقابة الجهاز والقروض والتسهيلات الائتمانية والتثبت من التصرفات المالية والقيود المحاسبية المعمول بها ومراجعة حسابات التسوية ، والتحقق من أنها مؤيدة بالمستندات الرسمية .
                                </li>
                                <li>
                                    مراجعة القرارات الخاصة بشؤون الموظفين ومستحقات ما بعد الخدمة  للتأكد من مطابقتها للقوانين واللوائح والنظم المالية والإدارية .
                                </li>
                                <li>
                                    مراجعة أعمال المخازن والخزائن والمعامل والمختبرات وما في حكمها .
                                </li>
                                <li>
                                    مراجعة استثمارات الجهات الخاضعة لرقابة الجهاز.
                                </li>
                                <li>
                                    مراجعة كافة التصرفات الواقعة على الأراضي والعقارات الحكومية .
                                </li>
                                <li>
                                    فحص مشروع الحساب الختامي للدولة والحسابات الختامية للجهات الخاضعة لرقابة الجهاز ، وإبلاغ تقاريره إلى وزارة المالية لإجراء التسويات التصويبية قبل العرض على مجلس الشؤون المالية وموارد الطاقة الذي يتوجب إبلاغه بالتسويات التصويبية التي لم يتم الاستجابة لها لاتخاذ ما يراه مناسبا بشأنها تمهيدا لرفعه لجلالة السلطان .
                                </li>
                                <li>
                                    التحقق من كفاءة الأنظمة المالية والإدارية والكشف عن أوجه النقص والقصور فيها واقتراح وسائل علاجها وتلافيها .
                                </li>
                                <li>
                                    بحث الشكاوى التي ترد للجهاز عن الإهمال أو مخالفة القوانين واللوائح والقرارات المعمول بها وفقا للضوابط التي تحددها اللائحة .
                                </li>
                                <li>
                                    مراجعة مدى التزام الشركات والجهات المرخص لها بإدارة وتشغيل المرافق العامة  بالعقود أو الاتفاقيات المبرمة معها .
                                </li>
                                <li>
                                    فحص المخالفات المالية والإدارية التي تقع من العاملين بالجهات الخاضعة لرقابة الجهاز .
                                </li>
                                <li>
                                    متابعة تنفيذ أوامر وتوجيهات جلالة السلطان للجهات الخاضعة لرقابة الجهاز .
                                </li>
                                <li>
                                    مراجعة المستندات والسجلات والحسابات ومؤيداتها والحسابات الآلية وأقراص الحفظ في الجهات التي توجد بها أو في مقر الجهاز ، ويحق له طلب ومراجعة أي سند أو سجل أو أي محضر من محاضر اللجان ومجالس الإدارة أو أي وثائق أو أوراق أخرى لازمة للقيام باختصاصاته على الوجه الأكمل ، دون إخطار مسبق لهذه الجهات ، وله إذا اقتضى الأمر الاحتفاظ بها لحين انتهاء أعمال المراجعة والفحص ويحق له ربط الأنظمة الإلكترونية المعمول بها في الجهات الخاضعة لرقابته بالجهاز.
                                </li>
                                <li>
                                    الاستعانة بالخبراء والفنيين مع تحديد وصرف مقابل الخدمة على النحو الذي تبينه اللائحة.
                                </li>
                            </ol>
                        </div>
                        <div class="tab-pane fade" id="pills-development" role="tabpanel" aria-labelledby="pills-development-tab">
                            <ol class="listPadding">
                                <li>
                                    إصدار قانون جديد للرقابة المالية والإدارية يساير أحدث القوانين الرقابية للأجهزة .
                                </li>
                            <li>
                                تحديث الهيكل التنظيمي للجهاز .
                            </li>
                            <li>
                                مد مظلة رقابة الجهاز إلى وحدات لم تكن مشمولة :
                                    <ul>
                                        <li>
                                            وحدات الجهاز الإداري للدولة إلا ما استثني منها بنص خاص في مرسوم إنشائها .
                                        </li>
                                        <li>
                                            الهيئات والمؤسسات العامة وغيرها من الأشخاص الاعتبارية العامة .
                                        </li>
                                        <li>
                                            صناديق الاستثمار وصناديق التقاعد وأي صناديق حكومية أخرى .
                                        </li>
                                        <li>
                                            الشركات المملوكة للحكومة بالكامل أو تلك التي تساهم فيها ، بنسبة تزيد على ( 40 % ) من رأس مالها ، الجهات الخاضعة لرقابة الجهاز منفردة أو مجتمعة وتلك التي منحتها الحكومة امتياز استخدام مرفق عام أو مورد من موارد الثروة الطبيعية ، والشركات والمؤسسات التي يتم التعاقد معها أو الترخيص لها بإدارة او تشغيل أي من الأموال العامة ، وذلك دون الإخلال بأي أحكام خاصة قد تنص عليها القوانين والمراسيم السلطانية الصادرة بشأنها والاتفاقيات التي تبرم مع الحكومة تنفيذا لها . ولا تخل رقابة الجهاز بحق هذه الشركات في أن يكون لها مراقبو حسابات تعينهم الجمعية العامة وفقا لأحكام قانون الشركات التجارية .
                                        </li>
                                        <li>
                                            الأموال الخاصة التي تديرها أو تشرف عليها أي من الوحدات الخاضعة لرقابة الجهاز .
                                        </li>
                                        <li>
                                            الجهات غير الخاضعة لرقابة الجهاز ، بناء على طلب تلك الجهات ، إذا رأى الجهاز أن المصلحة العامة تقتضي ذلك . 
                                        </li>
                                    </ul>
                            </li>
                            <li>
                                إصدار أول لائحة لتنظيم شؤون الأعضاء والموظفين وتحديد معاملتهم المالية .
                            </li>
                            <li>
                                إعادة التوازن بين موارد الجهاز البشرية والوحدات المنوط به رقابتها وقصر تعيين الأعضاء على المؤهلين المتخصصين.
                            </li>
                            <li>
                                ابتعاث عدد من الأعضاء للدراسات العليا والشهادات المهنية ( ACCA ) ، ( CPA ) ، ( CIA ) .
                            </li>
                            <li>
                                إقامة ندوة للتدقيق الداخلي على مستوى جميع الوزارات والوحدات الحكومية لتنمية مهارات المدققين الداخليين ورفع كفاءة وحداتها .
                            </li>
                            <li>
                                التوسع في استخدام برامج ونظم تقنية المعلومات في المجالات الرقابية إضافة إلى الشؤون الإدارية والمالية .
                            </li>
                            <li>
                                نشر الوعي الرقابي بين العاملين في الوحدات الخاضعة للرقابة وتنمية سلوكهم وترسيخ عقائدهم للمحافظة على المال العام
                            </li>
                            <li>
                                تطبيق نظام الأرشفة الإلكترونية لكامل أعمال الجهاز .
                            </li>
                            <li>
                                إنشاء صفحة بإسم الجهاز ونشاطاته على الإنترنت .
                            </li>
                            <li>
                                تعزيز التعاون مع بعض الأجهزة الرقابية الشقيقة والصديقة ، وعقد اتفاقيات ثنائية لتنمية العلاقات وتبادل الخبرات بينها .
                            </li>
                            </ol>
                        </div>
                    </div> --}}

                    {{-- @for ($i = 1; $i < 11; $i++) --}}
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
                    {{-- @endfor --}}
                    
                </div>
            </article>
            @else
            <article>
                <h4>SAI at Glance</h4>
                <hr>
                <ul class="nav nav-pills mb-3 pr-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-history-tab" data-bs-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="true">
                            Historical Development of State Audit Institution in the Sultanate
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-goals-tab" data-bs-toggle="pill" href="#pills-goals" role="tab" aria-controls="pills-goals" aria-selected="false">
                            Objectives
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="pills-specialization-tab" data-bs-toggle="pill" href="#pills-specialization" role="tab" aria-controls="pills-specialization" aria-selected="false">
                        Role and responsibilities
                      </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-development-tab" data-bs-toggle="pill" href="#pills-development" role="tab" aria-controls="pills-development" aria-selected="false">
                            Recent Developments 2000/2011
                        </a>
                    </li>

                    
                </ul>
                <div class="tab-content p-3 text-justify" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
                        <p>
                            Since his accession to power in 1970, His Majesty Sultan Qaboos bin Saidpaid utmost attention to external oversight through an independent auditmechanism . Over a span of more than four decades now, it has witnessed severalphases of development and modernization as shown below:
                        </p>
                        <ol class="listPadding">
                            <li>
                                Financial Audit started after the Renaissance in 1970 as a minor department under the Directorate General of Finance. Its role was limited to pre-audit of payment vouchers.
                            </li>
                            <li>
                                In 1974, Royal Decree No. 6/74 annexed the above mentioned minor department to the Ministry of Royal Court Affairs as of 12/2/1974. Its prerogatives included auditing the administrative organs of the State and training their staff to enhance their performance. It issued its audit reports at the beginning of 1975.
                            </li>
                            <li>
                                In 1975, Royal Decree No. 26/75 issued the Law on the Organization of State Administrative Apparatus and the Audit Department became under the Ministry Royal Court Affairs. In 1981, Royal Decree No. 24/81 endorsed the organizational structure of that Ministry and upgraded the minor department to a Directorate General. Royal Decree No. 65/83 made it under the direct supervision of His Excellency the Minister of the Royal Court Affairs.
                            </li>
                            <li>
                                On 10/3/1985, Royal Decree No. 36/85 issued the first regulation on auditing State accounts. The regulation laid down the audit objectives, jurisdiction, prerogatives, procedures, auditees and periodical and annual reports to be issued by the Directorate General.
                            </li>
                            <li>
                                Later on 3/1/1989, the name of the Directorate General for Auditing Accounts was changed to the Secretariat General for Auditing Accounts pursuant to Royal Decree No. 129/91. Royal Decree No. 129/91, while promulgating State Audit Law, changed the name again to the Secretariat General for State Audit.
                            </li>
                            <li>
                                Royal Decree No. 95/99 dated 22/11/1999 amended the name of the Secretariat General for State Audit to State Audit Institution (SAI) as an governmental organ with financial and administrative autonomy. His Excellency Sayyid Abdullah bin Hamad bin Saif Al-Busaidi was appointed as its first Chairman. This was a decisive turning point that ensured and asserted the desirable audit autonomy and neutrality.
                            </li>
                            <li>
                                The new State Audit Law was promulgated by Royal Decree No. 55/2000 while Royal Decree No. 56/2000 endorsed its new organizational structure to facilitate achievement of its objectives and fulfilment of its responsibilities.
                            </li>
                            <li>
                                On 2/3/2011, Royal Decree No. 27/2011 radically reengineered the State Audit Institution  expanding its role, functions and responsibilities and empowering it with necessary authority.  It also appointed His Excellency Shaikh/ Nasser bin Hilal bin Nasser Al-Mawali as its Chairman.
                            </li>
                        </ol>
                    </div>
                    <div class="tab-pane fade" id="pills-goals" role="tabpanel" aria-labelledby="pills-goals-tab">
                        <ol class="listPadding">
                            <li>
                                To protect State public funds and ensure the adequacy of the traditional and automated internal control systems, the integrity of financial transactions, accounting entries, and abidance to the laws and regulations on the financial systems and personnel.
                            </li>
                            <li>
                                To expose the financial violations by the auditees.
                            </li>
                            <li>
                                To indicate the deficiencies or shortcomings in the applicable laws, regulations, and systems related to the financial and personnel aspects and propose rectification thereof.
                            </li>
                            <li>
                                To evaluate the performance of the auditees and ensure they use the resources economically, efficiently and effectively.
                            </li>
                            {{-- <li>
                                الإلتزام بمبدأ الشفافية في التصرفات المالية والإدارية.
                            </li>
                            <li>
                                الرقابة الوقائية والتأكد من حسن سير العمل.
                            </li>
                            <li>
                                تقييم أداء الجهات الخاضعة لرقابة الجهاز والتحقق من استخدام الموارد بطريقة اقتصادية وبكفاءة وفاعلية.
                            </li>
                            <li>
                                الكشف عن أسباب القصور في الأداء والإنتاج وتحديد المسؤولية.
                            </li> --}}
                        </ol>
                    </div>
                    <div class="tab-pane fade" id="pills-specialization" role="tabpanel" aria-labelledby="pills-specialization-tab">
                        {{-- <p>
                            يختص الجهاز بإجراء الرقابة المالية والإدارية في كافة المجالات ومنها:
                        </p> --}}
                        <ol class="listPadding">
                            <li>
                                Legal and accounting financial audit.
                            </li>
                            <li>
                                Administrative audit.
                            </li>
                            <li>
                                Performance audit and following up plan implementation.
                            </li>
                            <li>
                                Audit of the resolutions issued on financial violations.
                            </li>
                            {{-- <li>
                                الرقابة على الاستثمارات وكافة حسابات الجهات الخاضعة لرقابة الجهاز.
                            </li>
                            <li>
                                أي أعمال أخرى يكلف بها الجهاز من جلالة السلطان.
                            </li> --}}
                        </ol>

                        <p>
                            In order to perform these prerogatives, the SAI has the right to:
                        </p>

                        <ol>
                            <li>
                                Audit the accounts in terms of revenues, expenditure, settlements, bonds, and registers.
                            </li>
                            <li>
                                Verify the financial dispositions and accounting entries.
                            </li>
                            <li>
                                Review the decisions on personnel and after-service entitlements.
                            </li>
                            <li>
                                Review the works of warehouses, workshops, laboratories, farms and the like.
                            </li>
                            <li>
                                Review the advances, loans, investments and credit facilities.
                            </li>
                            <li>
                                Review the closing accounts of the auditees and the State final account.
                            </li>
                            <li>
                                Follow up the implementation of the development projects, assess the administrative and economic performance of various units, and verify the use of resources economically, efficiently and effectively.
                            </li>
                            {{-- <li>
                                التحقق من كفاءة الأنظمة المالية والإدارية والكشف عن أوجه النقص والقصور فيها واقتراح وسائل علاجها وتلافيها .
                            </li>
                            <li>
                                بحث الشكاوى التي ترد للجهاز عن الإهمال أو مخالفة القوانين واللوائح والقرارات المعمول بها وفقا للضوابط التي تحددها اللائحة .
                            </li>
                            <li>
                                مراجعة مدى التزام الشركات والجهات المرخص لها بإدارة وتشغيل المرافق العامة  بالعقود أو الاتفاقيات المبرمة معها .
                            </li>
                            <li>
                                فحص المخالفات المالية والإدارية التي تقع من العاملين بالجهات الخاضعة لرقابة الجهاز .
                            </li>
                            <li>
                                متابعة تنفيذ أوامر وتوجيهات جلالة السلطان للجهات الخاضعة لرقابة الجهاز .
                            </li>
                            <li>
                                مراجعة المستندات والسجلات والحسابات ومؤيداتها والحسابات الآلية وأقراص الحفظ في الجهات التي توجد بها أو في مقر الجهاز ، ويحق له طلب ومراجعة أي سند أو سجل أو أي محضر من محاضر اللجان ومجالس الإدارة أو أي وثائق أو أوراق أخرى لازمة للقيام باختصاصاته على الوجه الأكمل ، دون إخطار مسبق لهذه الجهات ، وله إذا اقتضى الأمر الاحتفاظ بها لحين انتهاء أعمال المراجعة والفحص ويحق له ربط الأنظمة الإلكترونية المعمول بها في الجهات الخاضعة لرقابته بالجهاز.
                            </li>
                            <li>
                                الاستعانة بالخبراء والفنيين مع تحديد وصرف مقابل الخدمة على النحو الذي تبينه اللائحة.
                            </li> --}}
                        </ol>
                    </div>
                    <div class="tab-pane fade" id="pills-development" role="tabpanel" aria-labelledby="pills-development-tab">
                        <ol class="listPadding">
                            <li>
                                Issuing the new State Audit Law substantially upgrading the institution with international best practices and domestic requirements. 
                            </li>
                           <li>
                                Updating the organizational structure of the SAI.
                           </li>
                           <li>
                            Extension of audit to new units, such as:
                                <ul>
                                    <li>
                                        Companies owned by the government whether fully or at least 40% of their shares, or those companies the government has granted public utility concessions.
                                    </li>
                                    <li>
                                        Pension funds.
                                    </li>
                                    {{-- <li>
                                        صناديق الاستثمار وصناديق التقاعد وأي صناديق حكومية أخرى .
                                    </li>
                                    <li>
                                        الشركات المملوكة للحكومة بالكامل أو تلك التي تساهم فيها ، بنسبة تزيد على ( 40 % ) من رأس مالها ، الجهات الخاضعة لرقابة الجهاز منفردة أو مجتمعة وتلك التي منحتها الحكومة امتياز استخدام مرفق عام أو مورد من موارد الثروة الطبيعية ، والشركات والمؤسسات التي يتم التعاقد معها أو الترخيص لها بإدارة او تشغيل أي من الأموال العامة ، وذلك دون الإخلال بأي أحكام خاصة قد تنص عليها القوانين والمراسيم السلطانية الصادرة بشأنها والاتفاقيات التي تبرم مع الحكومة تنفيذا لها . ولا تخل رقابة الجهاز بحق هذه الشركات في أن يكون لها مراقبو حسابات تعينهم الجمعية العامة وفقا لأحكام قانون الشركات التجارية .
                                    </li>
                                    <li>
                                        الأموال الخاصة التي تديرها أو تشرف عليها أي من الوحدات الخاضعة لرقابة الجهاز .
                                    </li>
                                    <li>
                                        الجهات غير الخاضعة لرقابة الجهاز ، بناء على طلب تلك الجهات ، إذا رأى الجهاز أن المصلحة العامة تقتضي ذلك . 
                                    </li> --}}
                                </ul>
                           </li>
                           <li>
                                Issuing the first regulation for the organization of the affairs of staff and members and determination of their financial aspects.
                           </li>
                           <li>
                                Restoring the balance between SAI human resources and auditees and appointing only qualified specialists.
                           </li>
                           <li>
                                Sending a number of its members abroad to complete their higher and professional studies such as ACCA, CPA, and CIA.
                           </li>
                           <li>
                                Organizing a forum on internal audit at the level of all ministries and governmental units to develop the skills of internal auditors and raise the efficiency of such bodies.
                           </li>
                           <li>
                                Spreading the use of IT software and systems in audit fields in addition to the administrative and financial affairs. 
                           </li>
                           <li>
                                Raising audit awareness among the staff at auditees, improve their behaviours, and foster their manners to maintain public funds.
                           </li>
                           <li>
                                Applying electronic archiving of all SAI operations.
                           </li>
                           <li>
                                Upgrading SAI website.
                           </li>
                           <li>
                                Improving the cooperation with brotherly and friendly counterparts and signing mutual agreements to develop mutual relations and exchange of experiences.
                           </li>
                        </ol>
                    </div>
                </div>
            </article>
            @endif
        </div>
    </div>
</div>

@endsection