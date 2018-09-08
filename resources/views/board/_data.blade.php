<table id="result-list">
    <tr>
	<th style="text-align: left">ID</th>
	<th>漢字</th>
	<th>聲符</th>
	<th>韻部</th>
	<th>王力擬音</th>
	<th>李方桂擬音</th>
	<th>白一平擬音</th>
	<th>白一平-沙加爾擬音</th>
	<th>鄭張尚芳擬音</th>
	<th>廣韻反切</th>
	<th>音韻地位</th>
	<th>廣韻页码</th>
	<th style="text-align: right">今讀</th>
    </tr>
    @foreach ($items as $item)
	<tr>		
	    <td style="text-align: left;">{{ $item->id }}</td>
		<td>{{ rawurldecode($item->cn_character) }}</td>
		<td>{{ $item->phonetic_elements }}</td>
		<td>{{ $item->rhyme_element }}</td>
		<td>{{ $item->reconstruction_wl }}</td>
	    <td>{{ $item->reconstruction_lfg }}</td>
	    <td>{{ $item->reconstruction_byp }}</td>
	    <td>{{ $item->reconstruction_byps }}</td>
	    <td>{{ $item->reconstruction_zzsf }}</td>
	    <td>{{ $item->traditional_pronunciation }}</td>
	    <td>{{ $item->rhythm_status }}</td>
	    <td>{{ $item->guangyun_position }}</td>
	    <td style="text-align: right;">{{ $item->modern_pronunciation }}</td>
	</tr>
    @endforeach
</table>
