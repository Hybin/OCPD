@extends('layouts.default')
@section('title', '新増條目')

@section('content')
<div class="jumbotron" id="add-page">
	<h3>新増條目</h3>
	<form onsubmit="return confirm('確認提交？特别注意：如若必要，請完整塡寫音韻地位，避免出错！');" method="POST" action="{{ route('entries.store') }}" id="add-form">
		{{ csrf_field() }}
		<label for="kanji">漢字</label><br>
		<input type="text" name="kanji" placeholder="輸入漢字" class="bar" id="kanji"><br>
		<label for="shengfu">声符</label><br>
		<input type="text" name="shengfu" placeholder="輸入声符" class="bar" id="shengfu"><br>
		<label for="yunbu">韻部</label><br>
		<input type="text" name="yunbu" placeholder="輸入韻部" class="bar" id="yunbu"><br>
		<label for="ipa_wl">王力擬音</label><br>
		<input type="text" name="ipa_wl" placeholder="輸入擬音（王力）" class="bar" id="ipa_wl"><br>
		<label for="ipa_lfg">李方桂擬音</label><br>
		<input type="text" name="ipa_lfg" placeholder="輸入擬音（李方桂）" class="bar" id="ipa_lfg"><br>
		<label for="ipa_byp">白一平擬音</label><br>
		<input type="text" name="ipa_byp" placeholder="輸入擬音（白一平）" class="bar" id="ipa_byp"><br>
		<label for="ipa_byps">白一平-沙加爾擬音</label><br>
		<input type="text" name="ipa_byps" placeholder="輸入擬音（白一平-沙加尔）" class="bar" id="ipa_byps"><br>
		<label for="ipa_zzsf">鄭張尚芳擬音</label><br>
		<input type="text" name="ipa_zzsf" placeholder="輸入擬音（鄭張尚芳）" class="bar" id="ipa_zzsf"><br>
		<label for="initial">声母</label><br>
		<input type="text" name="initial" placeholder="輸入声母" class="bar" id="initial"><br>
		<label for="final">韻母</label><br>
		<input type="text" name="final" placeholder="輸入韻母" class="bar" id="final"><br>
		<label for="tail">攝</label><br>
		<input type="text" name="tail" placeholder="輸入攝" class="bar" id="tail"><br>
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
		</select><br>
		<label for="fanqie">反切</label><br>
		<input type="text" name="fanqie" placeholder="輸入反切" class="bar" id="fanqie"><br>
		<label for="yema">廣韻頁碼</label><br>
		<input type="text" name="yema" placeholder="輸入頁碼" class="bar" id="yema"><br>
		<label for="jindu">今讀</label><br>
		<input type="text" name="jindu" placeholder="輸入今讀" class="bar" id="jindu"><br>
		<button disabled type="submit" id="submit">提交</button>
		<a id="cancel">取消</a>
	</form>
</div>
@endsection
