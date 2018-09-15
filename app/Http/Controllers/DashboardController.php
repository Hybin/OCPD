<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Lexicon;
use App\Models\Trend;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', [
			'only' => ['open'],
		]);
	}
	
    public function open()
    {
		$editor = User::find(1);
		$this->authorize('dashboard', $editor);	

		$users = count(User::all());
		$entries = count(Lexicon::all());

		$trends = Trend::paginate(5);

    	return view('static_pages.dashboard', compact('users', 'entries', 'trends'));
    }
    
	public function restore(Request $request)
	{
		$editor = User::find(1);
		$this->authorize('dashboard', $editor);	

		$entry = Lexicon::withTrashed()->where('id', $request->lex_id)->restore();

		$trend = Trend::where('id', $request->trend_id)->delete();

		return redirect()->route('entries.show', $request->lex_id);
	}
	
}
