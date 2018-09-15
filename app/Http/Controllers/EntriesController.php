<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Lexicon;
use App\Models\User;
use App\Models\Trend;
use Auth;

class EntriesController extends Controller
{
	/**
	 * __construct
	 * Except EntriesController@show, users should login
	 *
	 */
	public function __construct()
	{
		$this->middleware('auth', [
			'except' => ['show'],
		]);
	}

	/**
	 * show
	 * direct to speific info page
	 *
	 * @param Lexicon $entry
	 */
	public function show($id)
	{
		$entry = Lexicon::find($id);

		if (!is_object($entry))
			$entry = Lexicon::onlyTrashed()->where('id', $id)->get()[0];

		return view('search.entry', compact('entry'));
	}

	/**
	 * create
	 * return create page
	 *
	 */
	public function create()
	{
		$editor = User::find(1);
		$this->authorize('entries', $editor);

		return view('entries.create');
	}
	
	/**
	 * store
	 * create a new entry
	 *
	 * @param Request $request
	 */
	public function store(Request $request)
	{
		$editor = User::find(1);
		$this->authorize('entries', $editor);

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

		$entry = Lexicon::create($data);

		$item = $entry->id .': ' . rawurldecode($entry->cn_character);
		$trend = Trend::create([
			'agent' => Auth::user()->name,
			'behaviour' => 'create',
			'theme' => $item,
			'operation' => 'lookup',
		]);

		session()->flash('success', '添加成功！');
		return redirect()->route('entries.show', $entry->id);
	}
	
	/**
	 * edit
	 * modify the entry
	 *
	 * @param mixed $id
	 */
	public function edit($id)
	{
		$editor = User::find(1);
		$this->authorize('entries', $editor);

		$entry = Lexicon::find($id);

		return view('static_pages.edit', compact('entry'));
	}
	
	
	/**
	 * update
	 * update the modified entry
	 *
	 * @param mixed $id
	 * @param Request $request
	 */
	public function update($id, Request $request)
	{
		$editor = User::find(1);
		$this->authorize('entries', $editor);

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

		$item = $entry->id .': ' . rawurldecode($entry->cn_character);
		$trend = Trend::create([
			'agent' => Auth::user()->name,
			'behaviour' => 'update',
			'theme' => $item,
			'operation' => 'lookup',
		]);

		session()->flash('success', '條目内容修改成功');

		return redirect()->route('entries.show', $entry->id);;
	}

	/**
	 * destroy
	 * delete the entry
	 *
	 * @param mixed $id
	 */
	public function destroy($id)
	{
		$editor = User::find(1);
		$this->authorize('entries', $editor);

		$entry = Lexicon::find($id);
		$item = $entry->id .': ' . rawurldecode($entry->cn_character);
		
		$entry->delete();

		$trend = Trend::create([
			'agent' => Auth::user()->name,
			'behaviour' => 'delete',
			'theme' => $item,
			'operation' => 'undo',
		]);

		return redirect()->route('entries.index');
	}
	
	/**
	 * index
	 * get all entries
	 *
	 */
	public function index()
	{
		$editor = User::find(1);
		$this->authorize('dashboard', $editor);

		$items = Lexicon::paginate(25);

		return view('entries.index', compact('items'));
	}
	
}
