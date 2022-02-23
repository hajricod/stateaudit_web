<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmployeeSection;
use Illuminate\Http\Request;

class EmployeesSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        checkPermission('public.view');
        $sections = [
            [
                "title"    => "النظام المالي والإداري",
                "title_en" => "cccc",
                "url"      => "http://saierpsp01/sites/DynamicsAx/EmployeeServices/Enterprise%20Portal/default.aspx?&WDPK=initial&WMI=EPPersonalInformation&redirected=1&WCMP=sai&WMI=EPPersonalInformation",
                "target"   => "_blank"
            ],
            [
                "title"    => "أهم القرارات والتعاميم",
                "title_en" => "Important Decisions and Statements",
                "url"      => "#",
                "target"   => ""
            ],
            [
                "title"    => "دليل الهاتف",
                "title_en" => "Phone Guide",
                "url"      => "#",
                "target"   => ""
            ],
            [
                "title"    => "دليل الحلقة المغلقة",
                "title_en" => "Closed Circle Guide",
                "url"      => "#",
                "target"   => ""
            ],
            [
                "title"    => "العروض والمميزات",
                "title_en" => "Promotions",
                "url"      => "/admin/promotions",
                "target"   => ""
            ],
            [
                "title"    => "المكتبة",
                "title_en" => "Library",
                "url"      => "/admin/library",
                "target"   => ""
            ]
        ];

        return view('admin.employees_section.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeSection  $employeeSection
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeSection $employeeSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeSection  $employeeSection
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeSection $employeeSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeSection  $employeeSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeSection $employeeSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeSection  $employeeSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeSection $employeeSection)
    {
        //
    }
}
