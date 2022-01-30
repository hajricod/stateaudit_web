<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FdgoController extends Controller
{
    public $path = 'site.fdgo.';

    public function index()
    {
        return view($this->path.'index');
    }
}
