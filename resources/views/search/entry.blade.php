@extends('layouts.default')
@section('title', rawurldecode($entry->cn_character))

@section('content')
<div class="jumbotron" id="entry-page">
	<div id="operations">
		<h3>詳細條目</h3>
		<div id="buttons">
			@if (Auth::check() && (Auth::user()->position == 'admin-kannrimono-guanliyuan' || Auth::user()->position == 'editor'))
			<button id="update">修改條目</button>
			<button id="remove">删除条目</button>
			@endif
		</div>
	</div>
	<div id="specific-info">
		<p><span>{{ rawurldecode($entry->cn_character) }}</span></p>
		<table id="properties">
			<tr>
				<td><strong>今讀：</strong>{{ $entry->modern_pronunciation }}</td>
				<td><strong>廣韻反切：</strong>{{ $entry->traditional_pronunciation }}</td>
				<td><strong>声符：</strong>{{ $entry->phonetic_element }}</td>
				<td><strong>韻部：</strong>{{ $entry->rhyme_element }}</td>
				<td id="position"g><strong>廣韻頁碼：</strong>{{ $entry->guangyun_position}}</td>
			</tr>
			<tr>
				<td><strong>王力：</strong>{{ $entry->reconstruction_wl }}</td>
				<td><strong>李方桂：</strong>{{ $entry->reconstruction_lfg }}</td>
				<td><strong>白一平：</strong>{{ $entry->reconstruction_byp }}</td>
				<td><strong>白一平-沙加爾：</strong>{{ $entry->reconstruction_byps }}</td>
				<td><strong>鄭張尚芳：</strong>{{ $entry->reconstruction_zzsf }}</td>
			</tr>
			<tr>
				<td><strong>音韻地位：</strong>{{ $entry->rhythm_status }}</td>
				<td><strong>声母：</strong></td>
				<td><strong>韻母：</strong></td>
				<td><strong>声調：</strong></td>
				<td><strong>韻尾：</strong></td>
			</tr>
		</table>
		<form method="GET" action="">
			<button type="submit">返回列表</button>
		</form>
	</div>
</div>
@endsection
