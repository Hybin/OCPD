<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchEntityController extends Controller
{
	public function simple(Request $request)
	{
		$keyword = $request->keyword;
	}
}
