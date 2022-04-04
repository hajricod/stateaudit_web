<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class PoliciesController extends Controller
{
    public $path = "site.policies.";

    public function index()
    {
        $policies = [
            [
                "title" => "الشروط والأحكام",
                "url" => "termsAndConditions.pdf"
            ],
            [
                "title" => "الخصوصية",
                "url" => "Privacy.pdf"
            ],
            [
                "title" => "سهولة الوصول للمعلومة",
                "url" => "Accessibility.pdf"
            ],
            [
                "title" => "السياسة الأمنية",
                "url" => "Security.pdf"
            ],
            [
                "title" => "سياسة المشاركات الإلكترونية",
                "url" => "eParticipationPolicyAr.pdf"
            ],
            [
                "title" => "ضوابط تطبيق التحول للحكومة الإلكترونية",
                "url" => "eTransformationPolicyAr.pdf"
            ],
            [
                "title" => "سياسة التواصل الاجتماعي الحكومي",
                "url" => "socialMediaPolicy.pdf"
            ],
            [
                "title" => "سياسات مكافحة الفساد",
                "url" => "##"
            ],
            [
                "title" => "سياسات البيانات الحكومية المفتوحة",
                "url" => "openDataPolicyAr.pdf"
            ],
            [
                "title" => "121-2008 - الاتفاقية الدولية لحقوق الأشخاص ذوي الاعاقة",
                "url" => "Rights_of_Persons_with_Disabilities.pdf"
            ],
            [
                "title" => "قانون رعاية وتأهيل المعاقين",
                "url" => "Care_and_the_Rehabilitation_of_Disabled_Persons.pdf"
            ],
            [
                "title" => "نظام إدارة الجودة",
                "url" => "qualitySec.pdf"
            ],
        ];

        $policies_en = [
            [
                "title" => "Terms and Conditions",
                "url" => "termsAndConditionsEng.pdf"
            ],
            [
                "title" => "Privacy",
                "url" => "PrivacyPolicyEng.pdf"
            ],
            [
                "title" => "Accessibility",
                "url" => "##"
            ],
            [
                "title" => "Security Policy",
                "url" => "SecurityPolicyEng.pdf"
            ],
            [
                "title" => "E-Participation Policy",
                "url" => "eParticipationPolicy.pdf"
            ],
            [
                "title" => "E-Governmanet Transformation Policy",
                "url" => "eTransformationPolicy"
            ],
            [
                "title" => "Social Media Policy",
                "url" => "socialMediaPolicy.pdf"
            ],
            [
                "title" => "Anti-corruption Policies",
                "url" => "##"
            ],
            [
                "title" => "Opendata Policy",
                "url" => "openDataPolicy.pdf"
            ],
            [
                "title" => "121-2008 - ratification of the International Convention on the Rights of Persons with Disabilities",
                "url" => "Rights_of_Persons_with_Disabilities.pdf"
            ],
            [
                "title" => "The Law on the Care and the Rehabilitation of Disabled Persons",
                "url" => "Care_and_the_Rehabilitation_of_Disabled_Persons.pdf"
            ],
            [
                "title" => "Quality Managment System",
                "url" => "qualitySec.pdf"
            ],
        ];


        return view($this->path.'index', compact('policies', 'policies_en'));
    }
}
