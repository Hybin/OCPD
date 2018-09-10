<div id="result-tab">
<table id="result-list">
    <tr>
	<th style="text-align: left">ID</th>
	<th>漢字</th>
	<th>聲符</th>
	<th>韻部</th>
	@if (count($range) > 0)
		@foreach($range as $key => $val)
			<th>{{ $key }}擬音</th>
		@endforeach
	@endif
	<th>廣韻反切</th>
	<th>音韻地位</th>
	<th>廣韻页码</th>
	<th style="text-align: right">今讀</th>
    </tr>
    @foreach ($items as $item)
	<tr>		
	    <td style="text-align: left;">{{ $item->id }}</td>
		<td>{{ rawurldecode($item->cn_character) }}</td>
		<td>{{ $item->phonetic_element }}</td>
		<td>{{ $item->rhyme_element }}</td>
		@if (count($range) > 0)
			@foreach ($range as $val)
				<td>{{ $item->$val }}</td>
			@endforeach
		@endif
	    <td>{{ $item->traditional_pronunciation }}</td>
	    <td>{{ $item->rhythm_status }}</td>
	    <td>{{ $item->guangyun_position }}</td>
	    <td style="text-align: right;">{{ $item->modern_pronunciation }}</td>
	</tr>
    @endforeach
</table>
</div>
