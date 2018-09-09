<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function back()
	{
		return redirect()->intended(route('home'));
	}
}
