<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Lexicon;

class EntriesController extends Controller
{
	/**
	 * show
	 * direct to speific info page
	 *
	 * @param Lexicon $entry
	 */
	public function show($id)
	{
		$entry = Lexicon::find($id);

		return view('search.entry', compact('entry'));
	}

	public function edit($id)
	{
		$entry = Lexicon::find($id);

		return view('static_pages.edit', compact('entry'));
	}
	
	
	public function update($id, Request $request)
	{
		$entry = Lexicon::find($id);

		$rs_value = $request->initial . $request->final . $request->kaihe .
					$request->deng . $request->tone . $request->tail;

		$data = [
			'cn_character' => rawurlencode($request->kanji), 'phonetic_element' => $request->shengfu,
			'rhyme_element' => $request->yunbu, 'reconstruction_wl' => $request->ipa_wl,
			'reconstruction_lfg' => $request->ipa_lfg, 'reconstruction_byp' => $request->ipa_byp,
			'reconstruction_byps' => $request->ipa_byps, 'reconstruction_zzsf' => $request->ipa_zzsf,
			'rhythm_status' => $rs_value, 'traditional_pronunciation' => $request->fanqie,
			'guangyun_position' => $request->yema, 'modern_pronunciation' => $request->jindu
		];

		$entry->update($data);

		session()->flash('success', '條目内容修改成功');

		return redirect()->route('entries.show', $entry->id);;
	}

	public function destroy($id)
	{
		$entry = Lexicon::find($id);

		$entry->delete();

		return back();
	}
	
	
}
