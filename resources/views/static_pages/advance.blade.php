@extends('layouts.default')
@section('title', '高級搜索')

@section('content')
	<div class="jumbotron">
		<h3>高級搜索</h3>
		<form method="GET" action="{{ route('search.advance') }}" id="advance-search">
			<label for="rhm-stats">按音韻地位查詢</label><br>
			<div id="rhm-stats">
				<input type="text" name="initial" placeholder="声母" class="bar" id="initial">
				<input type="text" name="final" placeholder="韻母" class="bar" id="final">
				<select name="kaihe" class="selection" id="kaihe">
					<option disabled selected>開合...</option>
					<option>開</option>
					<option>合</option>
				</select>
				<select name="deng" class="selection" id="deng">
					<option disabled selected>等...</option>
					<option>一</option>
					<option>二</option>
					<option>三</option>
					<option>四</option>
				</select>
				<select name="tone" class="selection" id="tone">
					<option disabled selected>声調...</option>
					<option>平</option>
					<option>上</option>
					<option>去</option>
					<option>入</option>
				</select>
				<input type="text" name="tail" placeholder="攝" class="bar" id="tail">
			</div>
			<label for="others">按其他條件查詢</label><br>
			<div id="others">
				<input type="text" name="shengfu" placeholder="声符" class="bar" id="shengfu">
				<input type="text" name="yunbu" placeholder="韻部" class="bar" id="yunbu">
				<input type="text" name="ipa" placeholder="擬音（國際音標）" class="bar" id="ipa">
			</div>
			<label for="range">設定查詢範圍</label><br>
			<div id="range">
				<input checked type="checkbox" name="onomatope[]" value="wl" class="checkbox" id="wl">
                <label for="wl">王力</label>
                <input checked type="checkbox" name="onomatope[]" value="lfg" class="checkbox" id="lfg">
                <label for="lfg">李方桂</label>
                <input checked type="checkbox" name="onomatope[]" value="byp" class="checkbox" id="byp">
                <label for="byp">白一平</label>
                <input checked type="checkbox" name="onomatope[]" value="byps" class="checkbox" id="byps">
                <label for="byps">白一平-沙加尔</label>
                <input checked type="checkbox" name="onomatope[]" value="zzsf" class="checkbox" id="zzsf">
				<label for="zzsf">郑张尚芳</label>
			</div>
			<button type="submit" id="submit">查詢</div>
			<a href="/" id="back">返回</a>
		</form>
	</div>
@endsection
