<table id="result-list">
    <tr>
	<th style="text-align: left">ID</th>
	<th>汉字</th>
    	<th>声符</th>
    	<th>韵部</th>
	<th>王力拟音</th>
	<th>李方桂拟音</th>
	<th>白一平拟音</th>
	<th>白一平-沙加尔拟音</th>
	<th>郑张尚芳拟音</th>
	<th>广韵反切</th>
	<th>音韵地位</th>
	<th>广韵页码</th>
	<th style="text-align: right">今读</th>
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
	    <td>{{ $item->tdaditional_pronunciation }}</td>
	    <td>{{ $item->rhythm_status }}</td>
	    <td>{{ $item->guangyun_position }}</td>
	    <td style="text-align: right;">{{ $item->modern_pronunciation }}</td>
	</tr>
    @endforeach
</table>
