<div id="result-tab">
<table id="result-list">
    <tr>
	<th style="text-align: left">序號</th>
	<th>漢字</th>
	<th>聲符</th>
	<th>韻部</th>
	@if (isset($range) && count($range) >= 0)
		@foreach($range as $key => $val)
			<th>{{ $key }}擬音</th>
		@endforeach
	@else
		<th>王力</th>
		<th>李方桂</th>
		<th>白一平</th>
		<th>白一平-沙加爾</th>
		<th>鄭張尚芳</th>
	@endif
	<th>廣韻反切</th>
	<th>音韻地位</th>
	<th>廣韻頁碼</th>
	<th>今讀</th>
	<th style="text-align: right">操作</th>
    </tr>
    @foreach ($items as $key =>  $item)
	<tr>		
	    <td style="text-align: left;">{{ $key + 1 }}</td>
		<td>{{ rawurldecode($item->cn_character) }}</td>
		<td>{{ $item->phonetic_element }}</td>
		<td>{{ $item->rhyme_element }}</td>
		@if (isset($range) && count($range) >= 0)
			@foreach ($range as $val)
				<td>{{ $item->$val }}</td>
			@endforeach
		@else
			<td>{{ $item->reconstruction_wl }}</td>
			<td>{{ $item->reconstruction_lfg }}</td>
			<td>{{ $item->reconstruction_byp }}</td>
			<td>{{ $item->reconstruction_byps }}</td>
			<td>{{ $item->reconstruction_zzsf }}</td>
		@endif
	    <td>{{ $item->traditional_pronunciation }}</td>
	    <td>{{ $item->rhythm_status }}</td>
	    <td>{{ $item->guangyun_position }}</td>
	    <td>{{ $item->modern_pronunciation }}</td>
	    <td style="text-align: right;"><a href="{{ route('entries.show', $item->id) }}">詳細</a></td>
	</tr>
    @endforeach
</table>
</div>
