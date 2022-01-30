<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public $path = 'site.contact_us.';

    public function index()
    {
        $branches = Branch::orderBy('sort')->where('status',  1)->get();
        
        return view($this->path.'index', compact('branches'));
    }
}
