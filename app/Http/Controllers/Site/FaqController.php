<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqGroup;

class FaqController extends Controller
{
    public $path = 'site.faq.';

    public function index()
    {
        $faqs      = Faq::all();
        $faqgroups = FaqGroup::all();

        return view($this->path.'index', compact('faqs', 'faqgroups'));
    }
}
