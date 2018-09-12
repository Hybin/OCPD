<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
	
}
