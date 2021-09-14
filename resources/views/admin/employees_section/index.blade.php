@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 pt-5 pb-3">
            <h4>{{__('Employees Section')}}</h4>
            <hr>
            {{-- <p class="border-bottom w-25">{{__('Services')}}</p> --}}
            <div class="row bg-white pt-3">
                
                <div class="col-md-6 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-link btn-block" target="_blank" href="https://mail.sai.gov.om/owa/">{{__('Email')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-link btn-block" target="_blank" href="http://saierpsp01/sites/DynamicsAx/EmployeeServices/Enterprise%20Portal/default.aspx?&WDPK=initial&WMI=EPPersonalInformation&redirected=1&WCMP=sai&WMI=EPPersonalInformation">النظام المالي والإداري</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-link btn-block" href="#">أهم القرارات والتعاميم</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-link btn-block" href="#">دليل الهاتف</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-link btn-block" href="#">دليل الحلقة المغلقة</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-link btn-block" href="#">الجهات الخاضعة</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-link btn-block" href="/admin/promotions">العروض والمميزات</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection