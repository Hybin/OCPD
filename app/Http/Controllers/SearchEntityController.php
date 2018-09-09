<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Lexicon;

class SearchEntityController extends Controller
{
	/**
	 * __construct
	 * Permission managment
	 * Which means that user who sign in would able to search with more conditions
	 * while gust could only search with Kanji
	 */
	public function __construct()
	{
		$this->middleware('auth', [
			'except' => ['simple', 'result']
		]);
	}
	
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
		$items = Lexicon::where('cn_character', rawurlencode($keyword))->get();

		return view('search.result', compact('items', 'keyword'));
	}

	/**
	 * advance
	 * return the page of advance page
	 */
	public function advance()
	{
		return view('static_pages.advance');
	}

	/**
	 * denull
	 * remove the null value in the array
	 *
	 * @param mixed $array
	 */
	protected function denull($array)
	{
		$temp = array();
		foreach($array as $item) {
			if (strlen($item) !== 0)
				array_push($temp, $item);
		}
		return $temp;
	}
	
	public function results(Request $request)
	{
		$rhyme_status = array(
			$request->initial,    // 声母
			$request->final,      // 韵母
			$request->kaihe,      // 開合
			$request->deng,       // 等
			$request->tone,       // 声调
			$request->tail        // 攝
		);

		$rs_value = '%' . implode('%', SearchEntityController::denull($rhyme_status)) . '%';   // Search with rhyme status(音韵地位)

		$items = Lexicon::where(
			['rhythm_status', 'like', $rs_value],
		)->get();

		return $rs_value;
	}
	
}
