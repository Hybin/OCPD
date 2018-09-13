<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function open()
    {
    	return view('static_pages.dashboard');
    }
    
}
