@extends('layouts.default')
@section('title', '所有條目')

@section('content')
<div class="jumbotron" style="height: 52em;">
    <div id="operations-lex">
		<h3>所有條目</h3>
		<p>總計 {{ $items->total()  }} 條記錄</p>
		<div id="buttons">
			<a href="{{ route('entries.create') }}"><button id="new">新増條目</button></a>
			<a href="{{ route('dashboard.open') }}"><button id="back">Dashboard</button></a>
		</div>
    </div>
    @if (count($items) > 0)
		<div id="entries-list">
			<table id="entries">
				<tr>
					<th style="text-align: left">序號</th>
					<th>漢字</th>
					<th>聲符</th>
					<th>韻部</th>
					<th>王力</th>
					<th>李方桂</th>
					<th>白一平</th>
					<th>白一平-沙加爾</th>
					<th>鄭張尚芳</th>
					<th>廣韻反切</th>
					<th>音韻地位</th>
					<th>廣韻頁碼</th>
					<th>今讀</th>
					<th style="text-align: right">操作</th>
				</tr>
				@foreach ($items as $key => $item)
				<tr>		
					<td style="text-align: left;">{{ $item->id }}</td>
					<td class="kanji">{{ rawurldecode($item->cn_character) }}</td>
					<td>{{ $item->phonetic_element }}</td>
					<td>{{ $item->rhyme_element }}</td>
					<td>{{ $item->reconstruction_wl }}</td>
					<td>{{ $item->reconstruction_lfg }}</td>
					<td>{{ $item->reconstruction_byp }}</td>
					<td>{{ $item->reconstruction_byps }}</td>
					<td>{{ $item->reconstruction_zzsf }}</td>
					<td>{{ $item->traditional_pronunciation }}</td>
					<td>{{ $item->rhythm_status }}</td>
					<td>{{ $item->guangyun_position }}</td>
					<td>{{ $item->modern_pronunciation }}</td>
					<td style="text-align: right;"><a href="{{ route('entries.show', $item->id) }}">詳細</a></td>
				</tr>
				@endforeach
			</table>
			{!! $items->render() !!}
		</div>
    @else
		<img src="{{ asset('/images/bear.png') }}" id="error-img">
		<p id="error-msg">古人的發音太神秘啦！我們也在尋找...</p>
    @endif
</div>
@endsection
