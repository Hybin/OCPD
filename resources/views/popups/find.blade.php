<div id="continue-card" class="search-card">
	<h4>继续查询</h4>
	<form method="GET" action="{{ route('advance.results') }}">
		<p id="rhm-stats" class="marks">按音韻地位查詢</p>
		<input type="text" name="initial" placeholder="輸入声母進行查詢" class="bar" id="initial"><br>
		<input type="text" name="final" placeholder="輸入韻母進行查詢" class="bar" id="final"><br>
		<input type="text" name="tail" placeholder="輸入攝进行查詢" class="bar" id="tail"><br>
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
		<p id="others" class="marks">按其他條件查詢</p>
		<input type="text" name="shengfu" placeholder="輸入声符進行查詢" class="bar" id="shengfu"><br>
		<input type="text" name="yunbu" placeholder="輸入韻部進行查詢" class="bar" id="yunbu"><br>
		<input type="text" name="ipa" placeholder="輸入擬音（國際音標）進行查詢" class="bar" id="ipa"><br>
		<p id="range" class="marks">設定查詢範圍</p>
		<div id="range">
			<input type="checkbox" name="onomatope[]" value="wl" class="checkbox" id="wl">
            <label for="wl">王力</label>
            <input type="checkbox" name="onomatope[]" value="lfg" class="checkbox" id="lfg">
            <label for="lfg">李方桂</label>
            <input type="checkbox" name="onomatope[]" value="byp" class="checkbox" id="byp">
			<label for="byp">白一平</label>
            <input type="checkbox" name="onomatope[]" value="byps" class="checkbox" id="byps">
			<label for="byps">白一平-沙加尔</label>
			<input type="checkbox" name="onomatope[]" value="zzsf" class="checkbox" id="zzsf">
			<label for="zzsf">郑张尚芳</label>
		</div>
		<div id="button">
			<button disabled type="submit" id="submit">查詢</button>
			<button id="close">關閉</button>
		</div>
	</form>
</div>
