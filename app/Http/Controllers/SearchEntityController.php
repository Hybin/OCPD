<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Lexicon;

class SearchEntityController extends Controller
{
	/**
	 * simple
	 * get the keyword of simple search
	 *
	 * @param Request $request
	 */
	public function simple(Request $request)
	{
		$this->validate($request, [
			'keyword' => 'required'
		]);

		$keyword = $request->keyword;
		
		return redirect()->route('search.result', $keyword);	
	}

	/**
	 * result
	 * search with keyword
	 *
	 * @param mixed $keyword
	 */
	public function result($keyword)
	{
		$items = Lexicon::where('cn_character', $keyword)->get();

		return view('search.result', compact('items', 'keyword'));
	}
}
