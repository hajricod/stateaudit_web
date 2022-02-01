<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LawsAndRegulationsController extends Controller
{
    public $path = "site.laws.";

    public function index()
    {
        return view($this->path.'index');
    }
}
