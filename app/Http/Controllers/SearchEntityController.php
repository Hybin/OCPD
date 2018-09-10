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
	
	/**
	 * results
	 * search with multiple conditions
	 *
	 * @param Request $request
	 */
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

		$rs_conditions = SearchEntityController::denull($rhyme_status);

		if (count($rs_conditions) > 0)
			$rs_value = '%' . implode('%', $rs_conditions) . '%';   // Search with rhyme status(音韵地位)
		else
			$rs_value='';

		if (strlen($request->ipa) > 0)
			$ipa_value = '%' . $request->ipa . '%';
		else
			$ipa_value = '';

		$shengfu = $request->shengfu;
		$yunbu = $request->yunbu;

		if (strlen($shengfu) == 0)
			$shengfu = '';

		if (strlen($yunbu) == 0)
			$yunbu = '';

		$items = Lexicon::where([
			['rhythm_status', 'like', $rs_value],
			['phonetic_element', '=', $shengfu],
			['rhyme_element', '=', $yunbu],
		])->where(function ($query) use($ipa_value) {
			$query->where('reconstruction_wl', 'like', $ipa_value)
				  ->orWhere('reconstruction_lfg', 'like', $ipa_value)
				  ->orWhere('reconstruction_byp', 'like', $ipa_value)
				  ->orWhere('reconstruction_byps', 'like', $ipa_value)
				  ->orWhere('reconstruction_zzsf', 'like', $ipa_value);
		})->get();

		$conditions = array('声母' => $request->initial, '韻母' => $request->final, '開合' => $request->kaihe,
							'等' => $request->deng, '声調' => $request->tone, '攝' => $request->tail,
							'声符' => $request->shengfu, '韻部' => $request->yunbu, '拟音' => $request->ipa);

		return view('search.result', compact('items', 'conditions'));
	}
	
}
