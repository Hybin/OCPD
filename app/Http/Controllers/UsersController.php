<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
	/**
	 * __construct
	 *
	 * Access managment
	 */
	public function __construct()	
	{
		$this->middleware('auth', [
			'except' => ['create', 'store']
		]);

		$this->middleware('guest', [
			'only' => ['create']
		]);	
	}
		
	public function create()
	{
		return view('users.create');
	}
	
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:50',
			'email' => 'required|email|unique:users|max:255',
			'institute' => 'required|max:255',
			'password' => 'required|confirmed|min:6'
		]);

		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'institute' => $request->institute,
			'password' => bcrypt($request->password),
		]);

		Auth::login($user);
		return redirect()->route('home');
	}
	
	public function index()
	{
		$admin = User::find(1);
		$this->authorize('index', $admin);
		$users = User::all();

		return view('users.index', compact('users'));
	}
	
	public function update(User $user, Request $request)
	{
		$user->update([
			'editable' => intval($request->editable),
			'position' => $request->position,
		]);

		return redirect()->route('users.index');
	}
	
}
