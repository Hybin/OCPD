@extends('layouts.default')
@section('title', '首頁')

@section('content')
<div class="jumbotron">
    <div class="slogan">
        <img src="{{ asset('/images/deer.png') }}" id="slogan-img">
        <p>What does /the Ancient Chinese/ say?</p>
    </div>
    <form action="{{ route('search.simple') }}" method="GET" id="simple-search">
        <input type="text" name="keyword" id="search-bar" placeholder="輸入漢字進行查詢">
        <button type="submit" id="submit">搜 索</button>
    </form>
</div>
@stop
