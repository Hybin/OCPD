<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lexicon;

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

    	return view('static_pages.dashboard', compact('users', 'entries'));
    }
    
}
