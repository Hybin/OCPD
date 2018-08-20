<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Lexicon;

class SearchEntityController extends Controller
{
	public function simple(Request $request)
	{
		$keyword = $request->keyword;

		return redirect()->route('search.result', $keyword);	
	}

	public function result()
	{
		$items = Lexicon::where('cn_character', $keyword)->get();

		return view('search.result', compact('items'));
	}
}
