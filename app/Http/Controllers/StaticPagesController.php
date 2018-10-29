<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    /**
     * home
     *
     * for index.php
     */
    public function home()
    {
        return view('static_pages.home');
    }
}
