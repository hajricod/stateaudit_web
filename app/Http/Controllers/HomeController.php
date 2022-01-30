<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\FilesController;
use App\Models\News;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $files = new FilesController();

        $awards = [
            [
                "title" => "ISO9001 2015",
                "img"   => "SAI_ISO9001_2015.png",
                "width" => "150",
                "link"  => "#",
            ],
            [
                "title" => "الخدمة العامة",
                "img"   => "awards3.jpg",
                "width" => "85",
                "link"  => "#",
            ],
            [
                "title" => "جائزة الأمم المتحدة",
                "img"   => "awards2.jpg",
                "width" => "85",
                "link"  => "#",
            ],
            [
                "title" => "جائزة الرؤية الإقتصادية",
                "img"   => "awards1.jpg",
                "width" => "85",
                "link"  => "#",
            ],
            [
                "title" => "جائزة موقع عمان",
                "img"   => "techaward.jpg",
                "width" => "73",
                "link"  => "#",
            ],
        ];

        $institutes = [
            [
                "title" => "intosai",
                "img"   => "intosai.png"
            ],
            [
                "title" => "asosai",
                "img"   => "asosai.png"
            ],
            [
                "title" => "arabosai",
                "img"   => "arabosai.png"
            ],
        ];

        // $footerCategories = [
        //     [
        //         "id" => "1",
        //         "title" => "Mobile Apps"
        //     ],
        //     [
        //         "id" => "2",
        //         "title" => "Social Networking Channels"
        //     ],
        //     [
        //         "id" => "3",
        //         "title" => "Contact Us"
        //     ],
        //     [
        //         "id" => "4",
        //         "title" => "Quick Links"
        //     ],
        // ];

        // $footerLinks = [
        //     [
        //         "id"     => "1",
        //         "cateId" => "1",
        //         "title"  => "Android",
        //         "url"    => "https://play.google.com/store/apps/details?id=com.stateaudit.app",
        //         "icon"   => "",
        //     ],
        //     [
        //         "id"     => "2",
        //         "cateId" => "1",
        //         "title"  => "iOS",
        //         "url"    => "#",
        //         "icon"   => "",
        //     ],
        //     [
        //         "id"     => "3",
        //         "cateId" => "2",
        //         "title"  => "Youtube",
        //         "url"    => "#",
        //         "icon"   => "",
        //     ],
        //     [
        //         "id"     => "4",
        //         "cateId" => "2",
        //         "title"  => "Twitter",
        //         "url"    => "#",
        //         "icon"   => "",
        //     ],
        //     [
        //         "id"     => "5",
        //         "cateId" => "2",
        //         "title"  => "Instagram",
        //         "url"    => "#",
        //         "icon"   => "",
        //     ],
        //     [
        //         "id"     => "6",
        //         "cateId" => "2",
        //         "title"  => "Facebook",
        //         "url"    => "#",
        //         "icon"   => "",
        //     ],
        //     [
        //         "id"     => "7",
        //         "cateId" => "3",
        //         "title"  => "Feedback",
        //         "url"    => "#",
        //         "icon"   => "",
        //     ],
        //     [
        //         "id"     => "8",
        //         "cateId" => "3",
        //         "title"  => "Tel: 8-000-000-8",
        //         "url"    => "#",
        //         "icon"   => "",
        //     ],
        //     [
        //         "id"     => "9",
        //         "cateId" => "3",
        //         "title"  => "Al Bustan St, Muscat, Oman",
        //         "url"    => "#",
        //         "icon"   => "",
        //     ],
        //     [
        //         "id"     => "10",
        //         "cateId" => "4",
        //         "title"  => "Omanuna Portal",
        //         "url"    => "#",
        //         "icon"   => "",
        //     ],
        //     [
        //         "id"     => "11",
        //         "cateId" => "4",
        //         "title"  => "Policies",
        //         "url"    => "#",
        //         "icon"   => "",
        //     ],
        // ];

        $news = News::orderBy('created_at', 'desc')->get()->slice(0, 10);

        return view('home', 
        compact(
            'awards', 
            'institutes', 
            'news'
        ));
    }

}
