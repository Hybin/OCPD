@extends('layouts.default')
@section('title', 'dashboard')

@section('content')
<div class="dashboard-card" id="entrances">
	<img src="{{ 'http://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) . '?s=100&amp;d=identicon' }}" width="75px" height="75px" style="border-radius: 100%;"/>
	<p id="username">{{ Auth::user()->name }}</p>
	<table>
		<tr>
			<td>用户</td>
			<td>條目</td>
			<td>動態</td>
		</tr>
		<tr>
			<td><a href="{{ route('users.index') }}">{{ $users }}</a></td>
			<td><a href="{{ route('entries.index') }}">{{ $entries }}</a></td>
			<td><a href="">400</a></td>
		</tr>
	</table>
</div>

<div class="dashboard-card" id="trends">
	<h3>Dashboard / Trands</h3>
</div>
@endsection
