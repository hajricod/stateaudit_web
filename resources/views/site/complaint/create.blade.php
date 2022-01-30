@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 pt-5 pb-3">
            <h4>{{__('Complaints Window')}}</h4>
            <div class="card border-0 shadow-sm">
                <div class="card-body px-3 pt-5 pb-3">
                    {{-- @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif --}}
                    <p class="text-center">
                        <button type="button" class="btn btn-clear shadow-none text-primary" data-bs-toggle="modal" data-bs-target="#guideModal">
                            {{__('Submitting a Complaint Guide')}}
                        </button>
                    </p>

                    <div class="modal fade" id="guideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                {{__('Submitting a Complaint Guide')}}
                                </h5>
                                <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <p>يمكن إيصال البلاغ للجهاز عبر الوسائل التالية :
                                        <br>
                                        <br>
                                        1 - التقديم المباشر لمقر جهاز الرقابة المالية والإدارية للدولة في البستان وأفرع الجهاز<br>في كل من صلالة ،صحار ،نزوى ،صور ،البريمي ، الرستاق .
                                        <br><br>
                                        2 - البريد الالكتروني:<br><a href="mailto:complaints@sai.gov.om">complaints@sai.gov.om</a>
                                        <br><br>
                                        3 - الهاتف المجاني : 80000008<br>الفاكس : &nbsp; 22070660 <br>صندوق البريد:  727<br>الرمز البريدي:  100 مسقط <br><br>
                                        4 - تطبيقات الهواتف الذكية :SAI APP
                                        <br><a href="https://play.google.com/store/apps/details?id=com.stateaudit.app&amp;gl=US" target="_blank">Google Play</a> 
                                        <br><a href="https://apps.apple.com/om/app/stateauditapp-om/id1544695993#?platform=iphone" target="_blank">App Store</a>
                                        <br><br>
                                        5 - الموقع الإلكتروني عبر <a href="/complaint/create">نافذة البلاغات</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <form action="{{url('complaint')}}" method="post" enctype="multipart/form-data" id="frmComplaint">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="name" id="name" maxlength="100" value="{{ old('name')}}" placeholder="{{__('Name')}}" required>
                                    <label for="name"><span class="text-danger">*</span>{{__('Name')}}</label>
                                    @error('name')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="id_number" id="id_number" value="{{ old('id_number')}}" inputmode="numeric" placeholder="{{__('Id Number')}}" required>
                                    <label for="id_number"><span class="text-danger">*</span>{{__('Id Number')}}</label>
                                    @error('id_number')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone')}}" dir="ltr" placeholder="{{__('Phone')}}" required>
                                    <label for="phone"><span class="text-danger">*</span>{{__('Phone')}}</label>
                                    @error('phone')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" id="email" maxlength="255" value="{{ old('email')}}" placeholder="{{__('Email')}}" required email>
                                    <label for="email"><span class="text-danger">*</span>{{__('Email')}}</label>
                                    @error('email')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select name="type_id" class="form-select py-3" required>
                                        <option value="">{{__('Complaint Type')}}</option>
                                        @foreach ($complaint_types as $type)
                                        <option value="{{$type->id}}">{{lang() == 'ar'? $type->title: $type->title_en}}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="accused_party" maxlength="255" value="{{ old('accused_party')}}" placeholder="{{__('Accused Party')}}" required>
                                    <label for="accused_party"><span class="text-danger">*</span>{{__('Accused Party')}}</label>
                                    @error('accused_party')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="details"><span class="text-danger">*</span>{{__('Details')}}</label>
                                    <textarea type="text" class="form-control" name="details" id="details" maxlength="255" rows="10" required>{{ old('details')}}</textarea>
                                    @error('details')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>                                
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <p>{{__('Have you complained to the institute?')}}</p>
                                    <div class="d-flex align-items-center">
                                        <input type="radio" class="mx-2" name="question_1" value="1" required>
                                        <label class="m-0">{{__('Yes')}}</label>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <input type="radio" class="mx-2" name="question_1" value="0" required>
                                        <label class="m-0">{{__('No')}}</label>
                                    </div>
                                    @error('question_1')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <p>{{__('Have you complained to the judiciary?')}}</p>
                                    <div class="d-flex align-items-center">
                                        <input type="radio" class="mx-2" name="question_2" value="1" required>
                                        <label class="m-0">{{__('Yes')}}</label>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <input type="radio" class="mx-2" name="question_2" value="0" required> 
                                        <label class="m-0">{{__('No')}}</label>
                                    </div>
                                    @error('question_2')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <p>{{__('Have you complained to the State Audit Institution?')}}</p>
                                    <div class="d-flex align-items-center">
                                        <input type="radio" class="mx-2" name="question_3" value="1" required>
                                        <label class="m-0">{{__('Yes')}}</label>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <input type="radio" class="mx-2" name="question_3" value="0" required>
                                        <label class="m-0">{{__('No')}}</label>
                                    </div>
                                    @error('question_3')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">{{__('Attachments')}} ({{__('Optional')}})</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" class="btn btn-link" name="attch1" id="attch1">
                                @error('attch1')
                                    <p class="text-danger"> {{ $message }}</p>
                                    @else
                                    <br>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="file" class="btn btn-link" name="attch2" id="attch2">
                                @error('attch2')
                                    <p class="text-danger"> {{ $message }}</p>
                                    @else
                                    <br>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" class="btn btn-link" name="attch3" id="attch3">
                                @error('attch3')
                                    <p class="text-danger"> {{ $message }}</p>
                                    @else
                                    <br>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="file" class="btn btn-link" name="attch4" id="attch4">
                                @error('attch4')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <div class="p-1 rounded mb-3">
                                    <p class="m-0 mb-1 d-inline-block">
                                        <span class="text-danger">*</span>{{__('Allowed files')}}: 
                                        <span class="text-info m-0 mb-1">jpeg png jpg | doc docx | pdf | xls xlsx</span>
                                    </p>
                                    <span>/</span>
                                    <p class="m-0 mb-1 d-inline-block">
                                        <span class="text-danger">*</span>{{__('Max size for each file')}}: 
                                        <span class="text-info m-0 mb-1">(2MB)</span>
                                    </p>
                                </div>
                            </div>
                        </div>
        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-block btn-primary">
                                {{__('Send')}}
                            </button>
                        </div>                                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if (!session()->has('message') && !$errors->any())
    <div class="modal fade" id="conditionsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
                الشروط والأحكام لدخول أو استخدام نافذة البلاغات بالموقع الالكتروني لجهاز الرقابة المالية والإدارية للدولة
            </h5>
            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" id="btnClose">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <ol>
                <li>
                    يستقبل الجهاز الشكاوى والبلاغات التي تساهم في الكشف عن الانحرافات المالية والإدارية في مختلف الجهات الخاضعة لرقابته.
                </li>
                <li>
                    يباشر الجهاز بحث ودراسة الشكاوى والبلاغات المتعلقة بمخالفة الجهات الخاضعة لرقابته للقوانين والأنظمة واللوائح والقرارات المعمول بها أو الإهمال أو التقصير في أداء واجبات الوظيفة العامة أو المساس بالمال العام. 
                </li>
                <li>
                    يتم بحث ودراسة الشكاوى والبلاغات ولو كانت مجهولة المصدر بشرط توافر الوثائق المؤيدة للشكوى أو البلاغ.
                </li>
                <li>
                    إن المعلومات المقدمة يتم التعامل معها بسرية تامة ولن تكون متاحة إلا للمختصين في بحث ودراسة الشكوى أو البلاغ كما لا يجوز الإفصاح عن أسم مقدم الشكوى أو البلاغ إلا إذا كانت متعلقة بحق من حقوقه.
                </li>
                <li>
                    لن يتم النظر في الشكاوى والبلاغات التي تخرج عن  نطاق اختصاصه كما أن الجهاز غير ملزم بالإعلان عن الإجراءات التي يتخذها بشأن المخالفات التي يتم الإبلاغ عنها.
                </li>
                <li>
                    يتم حفظ الشكوى أو البلاغ في أي من الحالات الآتية :
                        <ol>
                            <li>
                                سبق فحصها من قبل الجهاز.
                            </li>
                            <li>
                                سبق والفصل فيها من قبل القضاء.
                            </li>
                            <li>
                                إذا كانت منظورة أمام القضاء.
                            </li>
                            <li>
                                لعدم صحتها أو لعدم الأهمية أو لعدم وجود وقائع محددة .وللجهاز حفظ الشكوى أو البلاغ لأي سبب آخر حسبما تقتضيه المصلحة العامة، كما يجوز تأجيل النظر فيهما حسب مقتضيات العمل.
                            </li>
                        </ol>
                </li>
            </ol>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="accepted">موافق</button>
            <button type="button" class="btn btn-secondary" id="declined">غير موافق</button>
            </div>
        </div>
        </div>
    </div>    
@endif


@endsection

@section('script')
<script>

        

    $(document).ready(function() {
        // $('#conditionsModal').modal({backdrop: 'static', keyboard: false, show: true});

        var modalConditions = new bootstrap.Modal(document.getElementById('conditionsModal'), {
            keyboard: false
        })

        var modalToggle = document.getElementById('conditionsModal');
        
        modalConditions.show(modalToggle);
        

        $('#declined').on('click', function() {
            window.location.href = "/"
        });

        $('#btnClose').on('click', function() {
            setTimeout(() => {
                window.location.href = "/";
            }, 1000);
        });

        $("#frmComplaint").on('submit', function(){
            $("#btnSubmit").prop("disabled", true);
            $("#spinner").removeClass("d-none");
        });
    });
</script>
@endsection