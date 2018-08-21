@extends('layouts.default')
@section('title', '搜索结果')

@section('content')
<div class="jumbotron" style="top: 2em; height: 40em;">
    <div id="non-result">
	<h4>搜索结果</h4>
	<p>总计 {{ count($items)  }} 条结果</p>
	<div id="buttons">
	    <button id="back">返回主页</button>
	    <button id="advance">高级搜索</button>
	</div>
    </div>
    @if (count($items) > 0)
	@include('board._data')
    @else
	<img src="{{ asset('/images/bear.png') }}" id="404-img">
    @endif
</div>
@stop
