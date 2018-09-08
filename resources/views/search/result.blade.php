@extends('layouts.default')
@section('title', '搜索結果')

@section('content')
<div class="jumbotron" style="top: 2em; height: 40em;">
    <div id="non-result">
		<h4>搜索結果</h4>
		<p>總計 {{ count($items)  }} 條結果</p>
		<div id="buttons">
			<a href="{{ route('home') }}"><button id="back">返回主頁</button></a>
			<button id="advance">高級搜索</button>
		</div>
    </div>
	<div id="search-condition">
		<p>搜索條件：</p>
		<ul id="conditons">
			<li>漢字：{{ rawurldecode($keyword) }}</li>
		</ul>
	</div>
    @if (count($items) > 0)
		@include('board._data')
    @else
		<img src="{{ asset('/images/bear.png') }}" id="error-img">
		<p id="error-msg">我们暫未收錄“{{ rawurldecode($keyword) }}”哦！</p>
    @endif
</div>
@endsection
