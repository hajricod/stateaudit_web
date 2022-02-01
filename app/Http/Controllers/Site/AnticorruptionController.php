<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnticorruptionController extends Controller
{
    public $path = "site.anticorruption.";

    public function index()
    {
        return view($this->path.'index');
    }
}
