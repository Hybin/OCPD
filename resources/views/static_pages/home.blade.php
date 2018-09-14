@extends('layouts.default')
@section('title', '首頁')

@section('content')
<div class="jumbotron">
	@include('shared._messages')
    <div class="slogan">
        <img src="{{ asset('/images/deer.png') }}" id="slogan-img">
        <p>遂古之初，谁传道之？上下未形，何由考之？</p>
    </div>
    <form action="{{ route('search.simple') }}" method="GET" id="simple-search">
        <input type="text" name="keyword" id="search-bar" placeholder="輸入漢字進行查詢">
        <button type="submit" id="submit">搜 索</button>
    </form>
</div>
@stop
