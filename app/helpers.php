<?php

use Illuminate\Support\Facades\App;

if (!function_exists('lang')) {
    function lang()
    {
        return App::getLocale();
    }
}