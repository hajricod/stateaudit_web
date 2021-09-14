<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    public function setlang(Request $request) {
        // $minutes = 1;
        // $response = new Response();
        // $response->withCookie(cookie('lang', $request->lang, $minutes));
        Cookie::queue('lang', $request->lang, 60);
        return back();
     }
    public function getLang(Request $request) {
        $lang = Cookie::get('lang');
        echo $lang;
    }
}
