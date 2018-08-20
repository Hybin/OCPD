@extends('layouts.default')
@section('title', '搜索结果')

@section('content')
<div class="jumbotron">
	<h4>搜索结果</h4>
	<table id="result-list">
		<th>
			<td>ID</td>
			<td>汉字</td>
			<td>声符</td>
			<td>韵部</td>
			<td>王力拟音</td>
			<td>李方桂拟音</td>
			<td>白一平拟音</td>
			<td>白一平-沙加尔拟音</td>
			<td>郑张尚芳拟音</td>
			<td>广韵反切</td>
			<td>音韵地位</td>
			<td>广韵页码</td>
			<td>今读</td>
		</th>
		@foreach ($items as $item)
			<tr>{{ $item->id }}</tr>
			<tr>{{ $item->cn_character }}</tr>
			<tr>{{ $item->phonetic_elements }}</tr>
			<tr>{{ $item->rhyme_element }}</tr>
			<tr>{{ $item->reconstruction_wl }}</tr>
			<tr>{{ $item->reconstruction_lfg }}</tr>
			<tr>{{ $item->reconstruction_byp }}</tr>
			<tr>{{ $item->reconstruction_byps }}</tr>
			<tr>{{ $item->reconstruction_zzsf }}</tr>
			<tr>{{ $item->traditional_pronunciation }}</tr>
			<tr>{{ $item->rhythm_status }}</tr>
			<tr>{{ $item->guangyun_position }}</tr>
			<tr>{{ $item->modern_pronunciation }}</tr>
		@endforeach
	</table>
</div>
@stop
