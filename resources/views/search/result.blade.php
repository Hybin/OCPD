@extends('layouts.default')
@section('title', '搜索結果')

@section('content')
<div class="jumbotron" style="height: 48em;">
    <div id="non-result">
		<h4>搜索結果</h4>
		<p>總計 {{ count($items)  }} 條結果</p>
		<div id="buttons">
			<a href="{{ route('home') }}"><button id="back">返回主頁</button></a>
			<a href="{{ route('search.advance') }}"><button id="advance">高級搜索</button></a>
		</div>
    </div>
	<div id="search-condition">
		<p>搜索條件：</p>
		<ul id="conditons">
			@if (isset($keyword))
				<li>漢字：{{ rawurldecode($keyword) }}</li>
			@else
				@foreach ($conditions as $key => $condition)
					@if (strlen($condition) > 0)
						<li>{{ $key }}：{{ $condition }}</li>
					@endif
				@endforeach
			@endif
		</ul>
	</div>
    @if (count($items) > 0)
		@include('board._data')
    @else
		<img src="{{ asset('/images/bear.png') }}" id="error-img">
		<p id="error-msg">古人的發音太神秘啦！我們也在尋找...</p>
    @endif
</div>
@endsection
